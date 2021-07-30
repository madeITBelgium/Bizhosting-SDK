<?php

namespace MadeITBelgium\Bizhosting;

use GuzzleHttp\Client;

/**
 * @version    1.0.0
 *
 * @copyright  Copyright (c) 2021 Made I.T. (https://www.madeit.be)
 * @author     Tjebbe Lievens <tjebbe.lievens@madeit.be>
 */
class Bizhosting
{
    private $version = '1.0.1';
    private $apitoken;
    public $teamId;
    private $apiServer = 'https://www.bizhosting.be';

    private $client;

    /**
     * Construct.
     *
     * @param $clientId
     * @param $clientSecret;
     * @param $client
     */
    public function __construct($apitoken, $teamId, $client = null)
    {
        $this->apitoken = $apitoken;
        $this->teamId = $teamId;

        if ($client == null) {
            $this->createClient();
        } else {
            $this->client = $client;
        }
    }

    private function createClient()
    {
        $this->client = new Client([
            'timeout'  => 120.0,
            'headers'  => [
                'User-Agent' => 'Bizhosting PHP SDK V'.$this->version,
                'Accept'     => 'application/json',
            ],
            'verify' => true,
        ]);
    }

    public function setClient($client)
    {
        $this->client = $client;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function setApitoken($apitoken)
    {
        $this->apitoken = $apitoken;
    }

    public function getApitoken()
    {
        return $this->apitoken;
    }

    /**
     * Execute API call.
     *
     * @param $requestType
     * @param $endPoint
     * @param $data
     */
    public function call($requestType, $endPoint, $data = null)
    {
        $body = [];
        if ($data !== null) {
            $body = ['form_params' => $data];
        }

        $headers = [
            'headers' => [
                'Authorization' => 'Bearer ' . config('bizhosting.apitoken')
            ]
        ];

        try {
            $response = $this->client->request($requestType, $this->apiServer . '/api/' . $endPoint, $body + $headers);
        } catch (ServerException $e) {
            throw $e;
        } catch (ClientException $e) {
            throw $e;
            if ($e->getCode() == 400) {
                throw new Exception($e->getResponse(), $e->getCode(), $e); //Bad reqeust
            } elseif ($e->getCode() == 401) {
                throw new Exception($e->getResponse(), $e->getCode(), $e); //Unauthorized
            } elseif ($e->getCode() == 403) {
                throw new Exception($e->getResponse(), $e->getCode(), $e); //Forbidden
            } elseif ($e->getCode() == 404) {
                throw new Exception($e->getResponse(), $e->getCode(), $e); // Not Found
            } elseif ($e->getCode() == 429) {
                throw new Exception($e->getResponse(), $e->getCode(), $e); //To Many Requests
            } elseif ($e->getCode() == 500) {
                throw new Exception($e->getResponse(), $e->getCode(), $e); //Internal server error
            }

            throw $e;
        }

        if ($response->getStatusCode() == 200 || $response->getStatusCode() == 201 || $response->getStatusCode() == 204) {
            $body = (string) $response->getBody();
        } else {
            throw new Exception('Invalid bizhosting statuscode', $response->getStatusCode());
        }

        return json_decode($body);
    }

    public function topleveldomain()
    {
        return new Topleveldomain($this);
    }

    public function domainname()
    {
        return new Domainname($this);
    }

    public function hosting()
    {
        return new Hosting($this);
    }
}
