<?php

namespace Icarus\Config;

use Exception;

/**
 * Configuration class
 */
class Config
{
    /**
     * Registry
     *
     * @var array
     */
    public static $registry = [];

    /**
     * Bind configuration file
     *
     * @param array $registry
     * @return void
     */
    public static function bind($registry)
    {
        foreach ($registry as $key => $value) {
            static::$registry[$key] = $value;
        }
    }

    /**
     * Get configuration value of a file
     *
     * @param int|string $key
     * @return void
     */
    public static function get($key)
    {
        if (!array_key_exists($key, static::$registry)) {
            throw new Exception("No {$key} is bound in the container.");
        }
        return static::$registry[$key];
    }
}
