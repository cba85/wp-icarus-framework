<?php

namespace Icarus\Models\Tables;

use Exception;
use Icarus\Models\Model;

/**
 * Table
 */
class Table extends Model
{
    /**
     * ID
     *
     * @var int
     */
    public $id;

    /**
     * Check required properties
     */
    public function __construct()
    {
        parent::__construct();

        if (empty($this->table)) {
            throw new Exception(get_class($this) . ' must have a table');
        }

        if (empty($this->key)) {
            throw new Exception(get_class($this) . ' must have a key');
        }

        if (empty($this->fields) or !is_array($this->fields)) {
            throw new Exception(get_class($this) . ' must have a fields array');
        }
    }

    /**
     * Get a row
     *
     * @return object
     */
    public function get()
    {
        global $wpdb;

        if (empty($this->id)) {
            throw new Exception("ID is not filled");
        }

        return $this->attributes = $wpdb->get_row("SELECT * FROM $this->table WHERE id = $this->id");
    }

    /**
     * Delete a row
     *
     * @return void
     */
    public function delete()
    {
        global $wpdb;

        if (empty($this->id)) {
            throw new Exception("ID is not filled");
        }

        $wpdb->delete($this->table, ['id' => $this->id]);

        foreach ($this->attributes as $key => $attribute) {
            $this->attributes->$key = null;
        }
        $this->id = null;
    }

    /**
     * Update a row
     * @return bool|int
     */
    public function update()
    {
        global $wpdb;

        if (empty($this->id)) {
            throw new Exception("ID is not filled");
        }

        return $wpdb->update(
            $this->table,
            (array) $this->attributes,
            [$this->key => $this->id]
        );
    }

    /**
     * Save a row
     *
     * @return void
     */
    public function save()
    {
        global $wpdb;

        if (!empty($this->id)) {
            throw new Exception("ID already exists");
        }

        $wpdb->insert($this->table, (array) $this->attributes);
        $this->id = $wpdb->insert_id;
    }
}
