<?php

namespace Icarus;

use Icarus\Support\Container\Container;
use Icarus\Support\Facades\Facade;
use Icarus\Support\Facades\Session;

/**
 * Plugin class
 */
class Plugin
{
    /**
     * Plugin onfiguration file
     *
     * @var string
     */
    protected $config;

    /**
     * Container plugin
     *
     * @var Container
     */
    public $container;

    /**
     * Create plugin
     *
     */
    public function __construct()
    {
        $this->container = new Container;
        Facade::setFacadePlugin($this);
    }

    /**
     * Add and set session and flash messages
     *
     * @param string $flashKey
     * @return void
     */
    public function withSession($key = "icarus-framework")
    {
        Session::setKey($key);
        return $this;
    }
}
