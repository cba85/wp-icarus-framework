<?php

namespace Icarus\Tests\Models\Models;

use Icarus\Models\Tables\Meta;

/**
 * Test parameters
 */
class TestMeta extends Meta
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
