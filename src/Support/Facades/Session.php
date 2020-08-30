<?php

namespace Icarus\Support\Facades;

/**
 * Session facade
 */
class Session extends Facade
{
    /**
     * Get facade accessor
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Session\\Session';
    }
}
