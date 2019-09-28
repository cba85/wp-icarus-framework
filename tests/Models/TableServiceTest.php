<?php

namespace Icarus\Tests\Models;

use Exception;
use Icarus\Models\Services\TableService;
use Icarus\Models\Tables\Table;
use Icarus\Tests\Models\Models\TestTable;
use PHPUnit\Framework\TestCase;

final class TableServiceTest extends TestCase
{
    public function testTableServiceGet()
    {
        $test = new TableService(new TestTable);
        $result = $test->get(1);
        $this->assertInstanceOf(Table::class, $result);
    }

    public function testTableServiceAll()
    {
        $test = new TableService(new TestTable);
        $results = $test->all();
        $this->assertIsArray($results);
    }

}
