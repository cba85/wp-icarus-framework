<?php

namespace Icarus\Models\Tables;

use Icarus\Models\Contracts\ModelInterface;
use Icarus\Models\Model;

/**
 * Table
 */
class Table extends Model implements ModelInterface
{
    /**
     * ID key name
     * @var string
     */
    protected $key;

    /**
     * Get the first row (default)
     *
     * @return void
     */
    public function first()
    {
        global $wpdb;
        return $this->attributes = $wpdb->get_row("SELECT * FROM $this->table");
    }

    /**
     * Get row
     *
     * @param int $id
     * @return object
     */
    public function get(int $id)
    {
        global $wpdb;
        return $this->attributes = $wpdb->get_row("SELECT * FROM $this->table WHERE id = $id");
    }

    /**
     * Get all results
     *
     * @return object
     */
    public function all($invert = false)
    {
        global $wpdb;
        $query = "SELECT * FROM $this->table";
        if ($invert) {
            $query .= " ORDER BY id DESC";
        }
        return $wpdb->get_results($query);
    }

    /**
     * Delete a row
     *
     * @param int $id
     * @return void
     */
    public function delete()
    {
        global $wpdb;
        return $wpdb->delete($this->table, ['id' => $id]);
    }

    /**
     * Update a row
     * @param  int    $id
     * @param  array  $values
     * @return bool|int
     */
    public function update(int $id, array $values)
    {
        global $wpdb;

        return $wpdb->update(
            $this->table,
            $values,
            [$this->key => $id]
        );
    }

    public function save()
    {

    }
}
