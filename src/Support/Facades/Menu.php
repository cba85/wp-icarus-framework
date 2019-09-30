<?php

namespace Icarus\Support\Facades;

/**
 * Menu facade
 */
class Menu extends Facade
{
    /**
     * Get facade accessor
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Menu\\Menu';
    }
}
