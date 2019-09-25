<?php

namespace Icarus\Tests\Config;

use PHPUnit\Framework\TestCase;
use Icarus\Routing\Router;

final class RouterTest extends TestCase
{

    protected $url = "/test.php?page=test";

    protected $routes = __DIR__ . '/routes/test.php';

    public function createUri()
    {
        $url = parse_url($this->url);
        return trim("{$url['path']}?{$url['query']}");
    }

    public function testRouterLoadRoutesfile()
    {
        $uri = $this->createUri();
        Router::load($this->routes)->direct($uri, 'GET');
    }

    public function testRouterMenuCreation()
    {
        $uri = $this->createUri();
        Router::load($this->routes)->direct($uri, 'GET')->createMenus();
    }
}
