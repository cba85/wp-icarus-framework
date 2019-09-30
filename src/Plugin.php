<?php

namespace Icarus;

use Icarus\Support\Facades\Config;
use Icarus\Support\Container\Container;
use Icarus\Support\Facades\View;
use Icarus\Support\Facades\Notice;
use Icarus\Support\Facades\Facade;

/**
 * Plugin class
 */
class Plugin
{
    /**
     * Container plugin
     *
     * @var Container
     */
    public $container;

    /**
     * Create plugin
     */
    public function __construct()
    {
        $this->container = new Container;
        Facade::setFacadePlugin($this);
    }

    /**
     * Add and set config module
     *
     * @return void
     */
    public function withConfig()
    {
        Config::bind(['plugin' => require __DIR__ . '/../../../../config/plugin.php']);
    }

    /**
     * Add and set view module
     *
     * @return void
     */
    public function withView()
    {
        View::setPath(Config::get('plugin')['view']);
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

    /**
     * Bootstrap plugin
     *
     * @return void
     */
    public function bootstrap()
    {
        $this->withConfig();
        $this->withView();
        $this->withNotice();
    }
}
