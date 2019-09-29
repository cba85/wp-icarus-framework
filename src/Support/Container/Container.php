<?php

namespace Icarus\Support\Container;

class Container
{
    protected $instances;

    public function addInstance($key, $instance)
    {
        $this->instances[$key] = $instance;
    }

    public function getInstances()
    {
        return $this->instances;
    }

    public function getInstance($key)
    {
        if (!isset($this->instances[$key])) {
            return null;
        }
        return $this->instances[$key];
    }

}
