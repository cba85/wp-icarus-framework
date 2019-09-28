<?php

namespace Icarus\Tests\Mocks;

use stdClass;

class Wpdb
{
    public $insert_id;

    public function get_row(string $query, $output_type = null, $row_offset = 0)
    {
        $attributes = new stdClass;
        $attributes->test1 = "test1";
        $attributes->test2 = "test2";
        return $attributes;
    }

    public function get_results(string $query, $output_type = null)
    {
        $attributes = [];
        $attributes[0] = new stdClass;
        $attributes[0]->test1 = "test1";
        $attributes[0]->test2 = "test2";
        $attributes[1] = new stdClass;
        $attributes[1]->test1 = "test3";
        $attributes[1]->test2 = "test4";
        return $attributes;
    }

    public function update(string $table, array $data, array $where, $format = null, $where_format = null)
    {
        return true;
    }

    public function delete(string $table, array $where, $where_format = null)
    {
        return true;
    }

    public function insert(string $table, array $data, $format = null)
    {
        $this->insert_id = 1;
        return true;
    }
}
