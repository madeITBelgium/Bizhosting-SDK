<?php

namespace MadeITBelgium\Bizhosting;

/**
 * @version    1.0.0
 *
 * @copyright  Copyright (c) 2021 Made I.T. (https://www.madeit.be)
 * @author     Tjebbe Lievens <tjebbe.lievens@madeit.be>
 */
class Domainname
{
    private $bizhosting;

    public function __construct($bizhosting)
    {
        $this->bizhosting = $bizhosting;
    }

    public function list($page = 1, $search = null)
    {
        return $this->bizhosting->call('GET', '1.0/domainname?' . http_build_query(['page' => $page, 'search' => $search]));
    }

    public function get($domainnameId)
    {
        return $this->bizhosting->call('GET', '1.0/domainname/' . $domainnameId);
    }

    public function check($domainname)
    {
        return $this->bizhosting->call('POST', '1.0/domainname/check', ['domainname' => $domainname]);
    }

    public function create($domainname, $contactData, $authToken = null)
    {
        $data = [
            'domainname' => $domainname,
        ] + (array) $contactData;

        if (!empty($authToken)) {
            $data['authToken'] = $authToken;
        }
        return $this->bizhosting->call('POST', '1.0/domainname/create', $data);
    }

    public function updateNameservers($domainnameId, $nameservers)
    {
        return $this->bizhosting->call('POST', '1.0/domainname/' . $domainnameId . '/nameserver', ['nameservers' => $nameservers]);
    }

    public function updateLock($domainnameId, $lock)
    {
        return $this->bizhosting->call('POST', '1.0/domainname/' . $domainnameId . '/lock', ['lock' => $lock]);
    }
}
