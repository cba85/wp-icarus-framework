<?php

namespace Icarus\Support\Facades;

/**
 * Admin facade
 */
class Admin extends Facade
{
    /**
     * Get facade accessor
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Admin\\Admin';
    }
}
