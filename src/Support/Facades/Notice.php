<?php

namespace Icarus\Support\Facades;

/**
 * Notice facade
 */
class Notice extends Facade
{
    /**
     * Get facade accessor
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Notice\\Notice';
    }
}
