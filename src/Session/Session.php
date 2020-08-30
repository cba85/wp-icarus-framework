<?php

namespace Icarus\Session;

/**
 * Session
 */
class Session
{
    /**
     * Constructor
     */
    public function __construct()
    {
        !@session_start();
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
            return $_SESSION[$key];
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
                $_SESSION[$sessionKey] = $sessionValue;
            }
            return;
        }
        $_SESSION[$key] = $value;
    }

    /**
     * Session exists
     *
     * @param int $key
     * @return void
     */
    public function has($key)
    {
        return isset($_SESSION[$key]) and !empty($_SESSION[$key]);
    }

    /**
     * Remove sessions
     *
     * @param int ...$key
     * @return void
     */
    public function remove(...$key)
    {
        foreach ($key as $sessionKey) {
            unset($_SESSION[$sessionKey]);
        }
    }

    /**
     * Flush all sessions
     *
     * @return void
     */
    public function flush()
    {
        $_SESSION = [];
    }

    /**
     * Return all session's key
     *
     * @return void
     */
    public function all()
    {
        return $_SESSION;
    }
}
