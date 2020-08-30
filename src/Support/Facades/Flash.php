<?php

namespace Icarus\Support\Facades;

/**
 * Flash facade
 */
class Flash extends Facade
{
    /**
     * Get facade accessor
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Session\\Flash';
    }
}
