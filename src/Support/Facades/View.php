<?php

namespace Icarus\Support\Facades;

/**
 * View facade
 */
class View extends Facade
{
    /**
     * Get facade accessor
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'View\\View';
    }
}
