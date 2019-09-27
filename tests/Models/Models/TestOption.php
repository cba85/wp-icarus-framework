<?php

namespace Icarus\Tests\Models\Models;

use Icarus\Models\Tables\Option;

/**
 * Test parameters
 */
class TestOption extends Option
{
    /**
     * Prefix for test
     *
     * @var string
     */
    protected $prefix = 'wp_icarus_';

    /**
     * Fields for account
     *
     * @var array
     */
    protected $fields = [
        'test1',
        'test2',
    ];
}
