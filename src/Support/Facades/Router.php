<?php

namespace Icarus\Support\Facades;

class Router extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Routing\\Router';
    }
}
