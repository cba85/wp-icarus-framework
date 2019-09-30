<?php

namespace Icarus\Tests\Models\Models;

use Icarus\Models\Tables\Option;

/**
 * Test parameters
 */
class TestOption extends Option
{
    /**
     * Prefix
     *
     * @return string
     */
    public function prefix()
    {
        return 'wp_icarus_';
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
