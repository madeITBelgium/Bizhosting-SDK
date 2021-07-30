<?php

namespace MadeITBelgium\Bizhosting\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * @version    1.0.0
 *
 * @copyright  Copyright (c) 2021 Made I.T. (http://www.madeit.be)
 * @author     Tjebbe Lievens <tjebbe.lievens@madeit.be>
 */
class Bizhosting extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'bizhosting';
    }
}
