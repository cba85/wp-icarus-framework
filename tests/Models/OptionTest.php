<?php

namespace Icarus\Tests\Models;

use Icarus\Tests\Models\Models\TestOption;
use PHPUnit\Framework\TestCase;

final class OptionTest extends TestCase
{
    public function testOptionGet()
    {
        $test = new TestOption;
        $test->get();
        $this->assertSame("test1", $test->test1);
    }

    public function testOptionSave()
    {
        $test = new TestOption;
        $test->test1 = "test1";
        $test->save();
        $this->assertSame("test1", $test->test1);
    }

    public function testOptionUpdate()
    {
        $test = new TestOption;
        $test->test1 = "test1";
        $test->update();
        $this->assertSame("test1", $test->test1);
    }

    public function testOptionDelete()
    {
        $test = new TestOption;
        $test->get();
        $test->delete();
        $this->assertNull($test->test1);
    }
}
