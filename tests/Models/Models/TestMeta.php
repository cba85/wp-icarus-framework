<?php

namespace Icarus\Tests\Models\Models;

use Icarus\Models\Tables\Meta;

/**
 * Test parameters
 */
class TestMeta extends Meta
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
