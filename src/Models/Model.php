<?php

namespace Icarus\Models;

use StdClass;

/**
 * Model
 */
abstract class Model
{
    /**
     * Model attributes
     *
     * @var array
     */
    protected $attributes;

    /**
     * Create attributes object
     */
    public function __construct()
    {
        $this->attributes = new StdClass;
    }

    /**
     * Get property
     *
     * @param string $key
     * @return string
     */
    public function __get($key)
    {
        return $this->attributes->{$key};
    }

    /**
     * Set property
     *
     * @param mixed $key
     * @param mixed $value
     */
    public function __set($key, $value)
    {
        return $this->attributes->{$key} = $value;
    }

    /**
     * Check if all attributes are empty
     *
     * @return void
     */
    public function empty()
    {
        $empty = true;
        foreach ($this->attributes as $attribute) {
            if (!empty($attribute)) {
                $empty = false;
            }
        }
        return $empty;
    }
}
