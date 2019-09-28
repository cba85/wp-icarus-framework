<?php

namespace Icarus\Tests\Models;

use Icarus\Tests\Models\Models\TestMeta;
use PHPUnit\Framework\TestCase;

final class MetaTest extends TestCase
{
    public function testMetaGet()
    {
        $test = new testMeta(1);
        $test->get();
        $this->assertSame("test1", $test->test1);
    }

    public function testMetaSave()
    {
        $test = new testMeta(1);
        $test->test1 = "test1";
        $test->save();
        $this->assertSame("test1", $test->test1);
    }

    public function testMetaUpdate()
    {
        $test = new testMeta(1);
        $test->test1 = "test1";
        $test->update();
        $this->assertSame("test1", $test->test1);
    }

    public function testMetaDelete()
    {
        $test = new testMeta(1);
        $test->get();
        $test->delete();
        $this->assertNull($test->test1);
    }
}
