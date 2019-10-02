<?php

namespace Icarus\Support\Container;

use Exception;

/**
 * Container plugin class
 */
class Container
{
    /**
     * Intances
     *
     * @var array
     */
    protected $instances;

    /**
     * Singleton
     *
     * @param string $key
     * @param callable $instance
     * @return void
     */
    public function singleton(string $key, $instance)
    {
        $this->instances[$key] = $instance;
        return $this;
    }

    /**
     * Get instances
     *
     * @return array
     */
    public function getInstances()
    {
        return $this->instances;
    }

    /**
     * Get an instance
     *
     * @param string $key
     * @return string|void
     */
    public function getInstance(string $key)
    {
        if (!array_key_exists($key, $this->instances)) {
            throw new Exception('Unable to get instance from container.');
        }

        return $this->instances[$key];
    }

}
