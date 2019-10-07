<?php

namespace Icarus\Tests\Config;

use PHPUnit\Framework\TestCase;
use Icarus\Support\Facades\Hook;
use Icarus\Tests\Mocks\HookController;

final class DeactivationTest extends TestCase
{
    public function testHookDeactivation()
    {
        Hook::register('deactivation', __FILE__, function () {
            return new HookController;
        });
    }
}
