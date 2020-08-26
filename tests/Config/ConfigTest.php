<?php

namespace Icarus\Tests\Config;

use Icarus\Config\Config;
use PHPUnit\Framework\TestCase;

final class ConfigTest extends TestCase
{

    public function testConfigValuesBinding()
    {
        $configFile = require(__DIR__ . '/config/test.php');
        $config = new Config;
        $config->bind(['test' => $configFile]);
        $this->assertSame("test", $config->get('test')['test']);
    }
}
