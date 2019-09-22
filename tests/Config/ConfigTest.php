<?php

namespace Icarus\Tests\Config;

use Exception;
use PHPUnit\Framework\TestCase;
use Icarus\Config\Config;

final class ConfigTest extends TestCase
{

    public function testConfigValuesBinding()
    {
        Config::bind(['test' => require __DIR__ . '/config/test.php']);
        $this->assertSame("test", Config::get('test')['test']);
    }
}
