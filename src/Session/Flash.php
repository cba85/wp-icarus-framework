<?php

namespace Icarus\Session;

use Icarus\Support\Facades\Session;

/**
 * Session flash message
 */
class Flash
{
    /**
     * Session key for flash session
     */
    protected $key;

    protected $attributes;

    /**
     * Constructor
     */
    public function __construct()
    {
        !@session_start();
    }

    /**
     * Get flash session key
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set flash session key
     *
     * @param string $key
     * @return void
     */
    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }

    /**
     * Save and unset flash session
     *
     * @return void
     */
    public function start()
    {
        $this->attributes = Session::get($this->key);
        if (Session::has($this->key)) {
            Session::remove($this->key);
        }
        Session::set($this->key, []);
    }

    /**
     * Create a flash message
     *
     * @param mixed $key
     * @param mixed $value
     * @return void
     */
    public function create($key, $value)
    {
        $this->attributes[$key] = $value;
        Session::set($this->key, [$key => $value]);
    }

    /**
     * Get a flash message
     *
     * @param mixed $key
     * @return mixed
     */
    public function get($key)
    {
        return $this->attributes[$key];
    }
}
