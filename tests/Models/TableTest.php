<?php

namespace Icarus\Tests\Models;

use Exception;
use Icarus\Tests\Models\Models\TestTable;
use PHPUnit\Framework\TestCase;

final class TableTest extends TestCase
{
    public function testTableGetEmpty()
    {
        $this->expectException(Exception::class);
        $test = new TestTable;
        $test->get();
    }

    public function testTableGet()
    {
        $test = new TestTable;
        $test->id = 1;
        $test->test1 = "test1";
        $test->get();
        $this->assertSame("test1", $test->test1);
    }

    public function testTableUpdateEmpty()
    {
        $this->expectException(Exception::class);
        $test = new TestTable;
        $test->update();
        $this->assertSame("test1", $test->test1);
    }

    public function testTableUpdate()
    {
        $test = new TestTable;
        $test->id = 1;
        $test->test1 = "test1";
        $test->update();
        $this->assertSame("test1", $test->test1);
    }

    public function testTableDeleteEmpty()
    {
        $this->expectException(Exception::class);
        $test = new TestTable;
        $test->delete();
        $this->assertNull($test->test1);
    }

    public function testTableDelete()
    {
        $test = new TestTable;
        $test->id = 1;
        $test->test1 = "test1";
        $test->delete();
        $this->assertNull($test->test1);
    }

    public function testTableSave()
    {
        $test = new TestTable;
        $test->test1 = "test1";
        $test->save();
        $this->assertSame(1, $test->id);
    }
}
