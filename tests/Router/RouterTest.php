<?php

namespace Icarus\Tests\Config;

use PHPUnit\Framework\TestCase;
use Icarus\Router\Router;

final class RouterTest extends TestCase
{

    public function testRouterLoadRoutesfile()
    {
        $url = parse_url('/test.php?page=test');
        $uri = trim("{$url['path']}?{$url['query']}");
        Router::load(__DIR__ . '/routes/test.php')->direct($uri, 'GET');
    }
}
