<?php

namespace Icarus\Tests\Models\Models;

use Icarus\Models\Tables\Table;

/**
 * Test parameters
 */
class TestTable extends Table
{
    /**
     * Table
     *
     * @return string
     */
    public function table()
    {
        return 'test';
    }

    /**
     * Key
     *
     * @return string
     */
    public function key()
    {
        return 'id';
    }

    /**
     * Fields
     *
     * @return array
     */
    public function fields()
    {
        return [
            'test1',
            'test2',
        ];
    }
}
