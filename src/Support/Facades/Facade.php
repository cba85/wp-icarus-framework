<?php
namespace Icarus\Support\Facades;

use Exception;

/**
 * Facade abstract class
 */
abstract class Facade
{
    /**
     * Loaded instances
     *
     * @var array
     */
    protected static $instances = [];

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
        if (!array_key_exists($key, self::$instances)) {
            $class = "Icarus\\{$key}\\{$key}";
            $instance = new $class;
            self::$instances[$key] = $instance;
        }

        $instance = self::$instances[$key];

        return $instance->$method(...$args);
    }
}
