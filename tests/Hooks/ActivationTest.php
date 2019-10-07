<?php

namespace Icarus\Tests\Config;

use PHPUnit\Framework\TestCase;
use Icarus\Support\Facades\Hook;
use Icarus\Tests\Mocks\HookController;

final class ActivationTest extends TestCase
{
    public function testHookActivation()
    {
        Hook::register('activation', __FILE__, function() {
            return new HookController;
        });
    }
}
