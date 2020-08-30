<?php

namespace Icarus\Session;

/**
 * Session
 */
class Session
{
    /**
     * Check if session has key
     *
     * @param mixed $key
     * @return boolean
     */
    public function has($key): bool
    {
        return isset($_SESSION[$key]) ? true : false;
    }

    /**
     * Get a session
     *
     * @param mixed $key
     * @return mixed
     */
    public function get($key)
    {
        if (!$this->has($key)) {
            return false;
        }
        return $_SESSION[$key];
    }

    /**
     * Push a session
     *
     * @param mixed $key
     * @param mixed $value
     * @return void
     */
    public function push($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Remove a session
     *
     * @param mixed $key
     * @return mixed
     */
    public function remove($key)
    {
        unset($_SESSION[$key]);
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
     * Flash a session value
     *
     * @param mixed $key
     * @return mixed
     */
    public function flash($key)
    {
        $value = $this->get($key);
        $this->remove($key);
        return $value;
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
