<?php
namespace Icarus\Support\Facades;

use Exception;

/**
 * Facade abstract class
 */
abstract class Facade
{
    protected static $app;

    /**
     * Loaded instances
     *
     * @var array
     */
    protected static $container = [];

    public static function setFacadeApplication($app)
    {
        static::$app = $app;
    }

    public static function getFacadeApplication()
    {
        return static::$app;
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

        if (!static::$app->container->getInstance($key)) {
            $class = "Icarus\\{$key}";
            $instance = new $class;
            static::$app->container->addInstance($key, $instance);
        }

        $instance = static::$app->container->getInstance($key);

        return $instance->$method(...$args);
    }
}
