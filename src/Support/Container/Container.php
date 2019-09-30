<?php

namespace Icarus\Support\Container;

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
        if (!isset($this->instances[$key])) {
            return null;
        }
        return $this->instances[$key];
    }

}
