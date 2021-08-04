<?php

namespace MadeITBelgium\Bizhosting;

/**
 * @version    1.0.0
 *
 * @copyright  Copyright (c) 2021 Made I.T. (https://www.madeit.be)
 * @author     Tjebbe Lievens <tjebbe.lievens@madeit.be>
 */
class Topleveldomain
{
    private $bizhosting;

    public function __construct($bizhosting)
    {
        $this->bizhosting = $bizhosting;
    }

    public function list($page = 1, $search = null)
    {
        return $this->bizhosting->call('GET', '1.0/topleveldomain?' . http_build_query(['page' => $page, 'search' => $search, 'team_id' => $this->bizhosting->teamId]));
    }
}
