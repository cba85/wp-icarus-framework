<?php

namespace Icarus\Support\Facades;

class Admin extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Admin\\Admin';
    }
}
