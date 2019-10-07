<?php

namespace Icarus\Hook;

use Exception;

/**
 * Wordpress hook class
 */
class Hook
{
    /**
     * Available hook actions
     *
     * @var array
     */
    protected $availableHooks = [
        'activation',
        'deactivation',
        'uninstall'
    ];

    /**
     * Check available hook
     *
     * @param string $hook
     * @return string|Exception
     */
    public function checkAvailable($hook)
    {
        $hook = strtolower($hook);
        if (!in_array($hook, $this->availableHooks)) {
            throw new Exception("Hook unavailable.");
        }
        return $hook;
    }

    /**
     * Register hook
     *
     * @param string $hook
     * @param string $file
     * @param callable $function
     * @return self
     */
    public function register(string $hook, string $file, callable $function)
    {
        $hook = $this->checkAvailable($hook);
        $registerHook = "register_{$hook}_hook";
        $registerHook($file, $function);
        return $this;
    }
}
