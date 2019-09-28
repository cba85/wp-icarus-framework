<?php

namespace Icarus\Tests\Models\Models;

use Icarus\Models\Tables\Table;

/**
 * Test parameters
 */
class TestTable extends Table
{
    /**
     * Table for test
     *
     * @var string
     */
    public $table = "test";

    /**
     * Prefix for test
     *
     * @var string
     */
    public $key = 'id';

    /**
     * Fields for account
     *
     * @var array
     */
    public $fields = [
        'test1',
        'test2',
    ];
}
