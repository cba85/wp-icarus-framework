<?php

namespace Icarus\Models\Tables;

use Icarus\Models\Contracts\ModelInterface;
use Icarus\Models\Model;

/**
 * Option table
 */
class Option extends Model implements ModelInterface
{

    /**
     * Get model options
     *
     * @return void
     */
    public function get()
    {
        foreach ($this->fields as $field) {
            $this->attributes->{$field} = get_option($this->prefix . $field);
        }
        return $this->attributes;
    }

    /**
     * Update model options
     *
     * @param boolean $autoload
     * @return void
     */
    public function save($autoload = false)
    {
        foreach ($this->fields as $field) {
            if (!isset($this->attributes->{$field})) {
                $this->attributes->{$field} = null;
            }
            update_option($this->prefix . $field, $this->attributes->{$field}, $autoload);
        }
    }

    /**
     * Update model options
     *
     * @return void
     */
    public function update()
    {
        $this->save();
    }

    /**
     * Delete model options
     * @return void
     */
    public function delete()
    {
        foreach ($this->fields as $field) {
            delete_option($this->prefix . $field);
            $this->attributes->$field = null;
        }
    }
}
