<?php

namespace Icarus\Session;

/**
 * Session
 */
class Session
{
    /**
     * Session key
     */
    protected $key;

    /**
     * Constructor
     */
    public function __construct()
    {
        if (session_status() == PHP_SESSION_DISABLED) {
            session_start();
        }
    }

    /**
     * Get session key
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set session key
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
     * Get session
     *
     * @param string $key
     * @param string $default
     * @return void
     */
    public function get($key, $default = null)
    {
        if ($this->has($key)) {
            return $_SESSION[$this->key][$key];
        }
        return $default;
    }

    /**
     * Set sessions
     *
     * @param string $key
     * @param string $value
     * @return void
     */
    public function set($key, $value = null)
    {
        if (is_array($key)) {
            foreach ($key as $sessionKey => $sessionValue) {
                $_SESSION[$this->key][$sessionKey] = $sessionValue;
            }
            return;
        }
        $_SESSION[$this->key][$key] = $value;
    }

    /**
     * Session exists
     *
     * @param int $key
     * @return void
     */
    public function has($key)
    {
        return isset($_SESSION[$this->key][$key]) and !empty($_SESSION[$this->key][$key]);
    }

    /**
     * Remove sessions
     *
     * @param int ...$key
     * @return void
     */
    public function remove(...$key)
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            return;
        }
        
        foreach ($key as $sessionKey) {
            unset($_SESSION[$this->key][$sessionKey]);
        }
    }

    /**
     * Flush all sessions
     *
     * @return void
     */
    public function flush()
    {
        $_SESSION[$this->key] = [];
    }

    /**
     * Return all session's key
     *
     * @return void
     */
    public function all()
    {
        return $_SESSION[$this->key];
    }
}
