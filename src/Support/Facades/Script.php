<?php

namespace Icarus\Support\Facades;

/**
 * Script facade
 */
class Script extends Facade
{
    /**
     * Get facade accessor
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Assets\\Script';
    }
}
