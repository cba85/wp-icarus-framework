<?php

namespace Icarus\Tests\Config;

use PHPUnit\Framework\TestCase;
use Icarus\Support\Facades\Hook;
use Icarus\Tests\Mocks\HookController;
use Exception;

final class HookTest extends TestCase
{
    public function testWrongHook()
    {
        $this->expectException(Exception::class);
        Hook::register('activate', __FILE__, function () {
            return new HookController;
        });
    }

    public function testChainedHooks()
    {
        Hook::register('activation', __FILE__, function () {
            return new HookController;
        })->register('deactivation', __FILE__, function () {
            return new HookController;
        });
    }
}
