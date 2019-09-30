<?php

namespace Icarus\Models\Tables;

use Exception;
use Icarus\Models\Contracts\TableInterface;
use Icarus\Models\Model;

/**
 * Table
 */
abstract class Table extends Model implements TableInterface
{
    /**
     * ID
     *
     * @var int
     */
    public $id;

    /**
     * Option key
     *
     * @var string
     */
    protected $key;

    /**
     * Option keys
     *
     * @var array
     */
    protected $fields;

    /**
     * Check required properties
     */
    public function __construct()
    {
        parent::__construct();
        $this->setTable();
        $this->setKey();
        $this->setFields();
    }

    /**
     * Set option table
     *
     * @return string
     */
    protected function setTable()
    {
        $this->table = $this->table();
    }

    /**
     * Set option key
     *
     * @return string
     */
    protected function setKey()
    {
        $this->key = $this->key();
    }

    /**
     * Set fields option
     *
     * @return array
     */
    protected function setFields()
    {
        $this->fields = $this->fields();
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
