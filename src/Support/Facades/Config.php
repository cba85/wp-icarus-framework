<?php

namespace Icarus\Support\Facades;

/**
 * Config facade
 */
class Config extends Facade
{
    /**
     * Get facade accessor
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Config\\Config';
    }
}
