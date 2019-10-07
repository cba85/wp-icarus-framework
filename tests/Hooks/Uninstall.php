<?php

namespace Icarus\Tests\Config;

use PHPUnit\Framework\TestCase;
use Icarus\Support\Facades\Hook;
use Icarus\Tests\Mocks\HookController;

final class UninstallTest extends TestCase
{
    public function testHookUninstall()
    {
        Hook::register('uninstall', __FILE__, function () {
            return new HookController;
        });
    }
}
