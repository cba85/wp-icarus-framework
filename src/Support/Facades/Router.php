<?php

namespace Icarus\Support\Facades;

/**
 * Router facade
 */
class Router extends Facade
{
    /**
     * Get facade accessor
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Routing\\Router';
    }
}
