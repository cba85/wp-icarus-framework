<?php

namespace Icarus\Support\Facades;

/**
 * Hook facade
 */
class Hook extends Facade
{
    /**
     * Get facade accessor
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Hook\\Hook';
    }
}
