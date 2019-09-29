<?php

namespace Icarus;

use Icarus\Support\Facades\Config;
use Icarus\Support\Container\Container;
use Icarus\Support\Facades\View;
use Icarus\Support\Facades\Notice;
use Icarus\Support\Facades\Facade;

class Plugin
{
    public $container;

    public function __construct()
    {
        $this->container = new Container;
        Facade::setFacadeApplication($this);
    }

    public function withConfig()
    {
        Config::bind(['plugin' => require __DIR__ . '/../../../../config/plugin.php']);
    }

    public function withView()
    {
        View::setPath(Config::get('plugin')['view']);
    }

    public function withNotice($key = "icarus-plugin")
    {
        Notice::setKey($key);
    }

    public function bootstrap()
    {
        $this->withConfig();
        $this->withView();
        $this->withNotice();
    }
}
