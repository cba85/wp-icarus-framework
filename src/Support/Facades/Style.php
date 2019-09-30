<?php

namespace Icarus\Support\Facades;

/**
 * Style facade
 */
class Style extends Facade
{
    /**
     * Get facade accessor
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Assets\\Style';
    }
}
