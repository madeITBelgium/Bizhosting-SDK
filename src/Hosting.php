<?php

namespace MadeITBelgium\Bizhosting;

/**
 * @version    1.0.0
 *
 * @copyright  Copyright (c) 2021 Made I.T. (https://www.madeit.be)
 * @author     Tjebbe Lievens <tjebbe.lievens@madeit.be>
 */
class Hosting
{
    private $bizhosting;

    public function __construct($bizhosting)
    {
        $this->bizhosting = $bizhosting;
    }
    
    public function list($page = 1, $search = null)
    {
        return $this->bizhosting->call('GET', '1.0/hosting?' . http_build_query(['page' => $page, 'search' => $search]));
    }

    public function get($hostingId)
    {
        return $this->bizhosting->call('GET', '1.0/hosting/' . $hostingId);
    }

    public function create($domainname)
    {
        return $this->bizhosting->call('POST', '1.0/hosting/create', ['domainname' => $domainname]);
    }

    public function updateDocroot($hostingId, $docroot)
    {
        return $this->bizhosting->call('PUT', '1.0/hosting/' . $hostingId . '/docroot', ['docroot' => $docroot]);
    }

    public function updateTemplate($hostingId, $template)
    {
        return $this->bizhosting->call('PUT', '1.0/hosting/' . $hostingId . '/template', ['template' => $template]);
    }

    public function updateSsl($hostingId, $ssl)
    {
        return $this->bizhosting->call('PUT', '1.0/hosting/' . $hostingId . '/ssl', ['ssl' => $ssl]);
    }

    public function updatePassword($hostingId, $password)
    {
        return $this->bizhosting->call('PUT', '1.0/hosting/' . $hostingId . '/password', ['password' => $password]);
    }


    public function dnsdomains($hostingId, $page = 1)
    {
        return $this->bizhosting->call('GET', '1.0/hosting/' . $hostingId . '/dns?' . http_build_query(['page' => $page]));
    }

    public function dnsdomain($hostingId, $dnsdomainId)
    {
        return $this->bizhosting->call('GET', '1.0/hosting/' . $hostingId . '/dns/' . $dnsdomainId);
    }

    public function dnsdomainCreate($hostingId, $data)
    {
        return $this->bizhosting->call('POST', '1.0/hosting/' . $hostingId . '/dns', $data);
    }

    public function dnsdomainUpdate($hostingId, $dnsId, $data)
    {
        return $this->bizhosting->call('PUT', '1.0/hosting/' . $hostingId . '/dns/' . $dnsId, $data);
    }

    public function dnsdomainDelete($hostingId, $dnsId)
    {
        return $this->bizhosting->call('DELETE', '1.0/hosting/' . $hostingId . '/dns/' . $dnsId);
    }


    public function dnsrecords($hostingId, $domainId, $page = 1)
    {
        return $this->bizhosting->call('GET', '1.0/hosting/' . $hostingId . '/dns/' . $domainId . '/record?' . http_build_query(['page' => $page]));
    }

    public function dnsrecord($hostingId, $domainId, $id)
    {
        return $this->bizhosting->call('GET', '1.0/hosting/' . $hostingId . '/dns/' . $domainId . '/record/' . $id);
    }

    public function dnsrecordCreate($hostingId, $domainId, $data)
    {
        return $this->bizhosting->call('POST', '1.0/hosting/' . $hostingId . '/dns/' . $domainId . '/record', $data);
    }

    public function dnsrecordUpdate($hostingId, $domainId, $id, $data)
    {
        return $this->bizhosting->call('PUT', '1.0/hosting/' . $hostingId . '/dns/' . $domainId . '/record/' . $id, $data);
    }

    public function dnsrecordDelete($hostingId, $domainId, $id)
    {
        return $this->bizhosting->call('DELETE', '1.0/hosting/' . $hostingId . '/dns/' . $domainId . '/record/' . $id);
    }


    public function maildomains($hostingId, $page = 1)
    {
        return $this->bizhosting->call('GET', '1.0/hosting/' . $hostingId . '/mail?' . http_build_query(['page' => $page]));
    }

    public function maildomain($hostingId, $maildomainId)
    {
        return $this->bizhosting->call('GET', '1.0/hosting/' . $hostingId . '/mail/' . $maildomainId);
    }

    public function maildomainCreate($hostingId, $data)
    {
        return $this->bizhosting->call('POST', '1.0/hosting/' . $hostingId . '/mail', $data);
    }

    public function maildomainUpdate($hostingId, $maildomainId, $data)
    {
        return $this->bizhosting->call('PUT', '1.0/hosting/' . $hostingId . '/mail/' . $maildomainId, $data);
    }

    public function maildomainDelete($hostingId, $maildomainId)
    {
        return $this->bizhosting->call('DELETE', '1.0/hosting/' . $hostingId . '/mail/' . $maildomainId);
    }



    public function mailaccounts($hostingId, $domainId, $page = 1)
    {
        return $this->bizhosting->call('GET', '1.0/hosting/' . $hostingId . '/mail/' . $domainId . '/account?' . http_build_query(['page' => $page]));
    }

    public function mailaccount($hostingId, $domainId, $id)
    {
        return $this->bizhosting->call('GET', '1.0/hosting/' . $hostingId . '/mail/' . $domainId . '/account/' . $id);
    }

    public function mailaccountCreate($hostingId, $domainId, $data)
    {
        return $this->bizhosting->call('POST', '1.0/hosting/' . $hostingId . '/mail/' . $domainId . '/account', $data);
    }

    public function mailaccountUpdate($hostingId, $domainId, $id, $data)
    {
        return $this->bizhosting->call('PUT', '1.0/hosting/' . $hostingId . '/mail/' . $domainId . '/account/' . $id, $data);
    }

    public function mailaccountDelete($hostingId, $domainId, $id)
    {
        return $this->bizhosting->call('DELETE', '1.0/hosting/' . $hostingId . '/mail/' . $domainId . '/account/' . $id);
    }



    public function databases($hostingId, $page = 1)
    {
        return $this->bizhosting->call('GET', '1.0/hosting/' . $hostingId . '/database?' . http_build_query(['page' => $page]));
    }

    public function database($hostingId, $databaseId)
    {
        return $this->bizhosting->call('GET', '1.0/hosting/' . $hostingId . '/database/' . $databaseId);
    }

    public function databaseCreate($hostingId, $data)
    {
        return $this->bizhosting->call('POST', '1.0/hosting/' . $hostingId . '/database', $data);
    }

    public function databaseUpdate($hostingId, $databaseId, $data)
    {
        return $this->bizhosting->call('PUT', '1.0/hosting/' . $hostingId . '/database/' . $databaseId, $data);
    }

    public function databaseDelete($hostingId, $databaseId)
    {
        return $this->bizhosting->call('DELETE', '1.0/hosting/' . $hostingId . '/database/' . $databaseId);
    }


    public function cronjobs($hostingId, $page = 1)
    {
        return $this->bizhosting->call('GET', '1.0/hosting/' . $hostingId . '/cronjob?' . http_build_query(['page' => $page]));
    }

    public function cronjob($hostingId, $cronjobId)
    {
        return $this->bizhosting->call('GET', '1.0/hosting/' . $hostingId . '/cronjob/' . $cronjobId);
    }

    public function cronjobCreate($hostingId, $data)
    {
        return $this->bizhosting->call('POST', '1.0/hosting/' . $hostingId . '/cronjob', $data);
    }

    public function cronjobUpdate($hostingId, $cronjobId, $data)
    {
        return $this->bizhosting->call('PUT', '1.0/hosting/' . $hostingId . '/cronjob/' . $cronjobId, $data);
    }

    public function cronjobDelete($hostingId, $cronjobId)
    {
        return $this->bizhosting->call('DELETE', '1.0/hosting/' . $hostingId . '/cronjob/' . $cronjobId);
    }
}
