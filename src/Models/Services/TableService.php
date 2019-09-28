<?php

namespace Icarus\Models\Services;

use Icarus\Models\Tables\Table;

/**
 * Table model service
 */
class TableService
{

    /**
     * Table service
     *
     * @var Table
     */
    protected $table;

    /**
     * Service constructor
     *
     * @param Table $table
     */
    public function __construct(Table $table)
    {
        $this->table = $table;
    }

    /**
     * Parse results to return Table object
     *
     * @param object $results
     * @return void
     */
    protected function parseResults($results)
    {
        $table = get_class($this->table);
        $model = new $table;

        foreach ($results as $key => $result) {
            $model->{$key} = $result;
        }

        return $model;
    }

    /**
     * All
     *
     * @return void
     */
    public function all()
    {
        global $wpdb;

        $results = $wpdb->get_results("SELECT * FROM {$this->table->table}");

        if (empty($results)) {
            return $results;
        }

        $collection = [];
        foreach ($results as $key => $result) {
            $collection[] = $this->parseResults($results);
        }

        return $collection;
    }

    /**
     * Get
     *
     * @param integer $id
     * @return void
     */
    public function get(int $id)
    {
        global $wpdb;

        $results = $wpdb->get_row("SELECT * FROM {$this->table->table} WHERE {$this->table->key} = {$id}");

        if (empty($results)) {
            return $results;
        }

        return $this->parseResults($results);
    }
}
