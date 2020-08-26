<?php

namespace Icarus;

use Icarus\Support\Container\Container;
use Icarus\Support\Facades\Notice;
use Icarus\Support\Facades\Facade;

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
     * Add and set notice module
     *
     * @param string $key
     * @return void
     */
    public function withNotice($key = "icarus-plugin")
    {
        Notice::setKey($key);
    }
}
