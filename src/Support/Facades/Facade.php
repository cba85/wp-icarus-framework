<?php

namespace Icarus\Support\Facades;

use Exception;

/**
 * Facade abstract class
 */
abstract class Facade
{
    /**
     * Plugin instance
     *
     * @var Plugin
     */
    protected static $plugin;

    /**
     * Set facade plugin
     *
     * @param Plugin $plugin
     * @return void
     */
    public static function setFacadePlugin($plugin)
    {
        static::$plugin = $plugin;
    }

    /**
     * Get facade plugin
     *
     * @return Plugin
     */
    public static function getFacadePlugin()
    {
        return static::$plugin;
    }

    /**
     * Get facade accessor
     *
     * @return Exception
     */
    protected static function getFacadeAccessor()
    {
        throw new Exception('Facade does not implement getFacadeAccessor method.');
    }

    /**
     * __callStatic
     *
     * @param string $method
     * @param array $args
     * @return void
     */
    public static function __callStatic($method, $args)
    {
        $key = static::getFacadeAccessor();

        if (!static::$plugin->container->getInstance($key)) {
            $class = "Icarus\\{$key}";
            $instance = new $class;
            static::$plugin->container->singleton($key, $instance);
        }

        $instance = static::$plugin->container->getInstance($key);

        return $instance->$method(...$args);
    }
}
