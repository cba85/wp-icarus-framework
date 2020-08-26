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
    public $registry = [];

    /**
     * Bind configuration file
     *
     * @param array $registry
     * @return void
     */
    public function bind(array $registry)
    {
        foreach ($registry as $key => $value) {
            $this->registry[$key] = $value;
        }
    }

    /**
     * Get configuration value of a file
     *
     * @param int|string $key
     * @return mixed
     */
    public function get($key)
    {
        if (!array_key_exists($key, $this->registry)) {
            throw new Exception("No {$key} is bound in the container.");
        }
        return $this->registry[$key];
    }

    /**
     * Get all values of a configuration file
     *
     * @return mixed
     */
    public function all()
    {
        return $this->registry;
    }
}
