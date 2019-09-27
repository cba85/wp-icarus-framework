<?php

namespace Icarus\Models\Tables;

use Icarus\Models\Contracts\ModelInterface;
use Icarus\Models\Model;

class Meta extends Model implements ModelInterface
{
    /**
     * Meta post id
     *
     * @var int
     */
    protected $postId = null;

    /**
     * Meta constructor
     *
     * @param int $postId
     */
    public function __construct(int $postId)
    {
        parent::__construct();
        $this->postId = $postId;
    }

    /**
     * Get model metas
     *
     * @return void
     */
    public function get()
    {
        foreach ($this->fields as $field) {
            $this->attributes->{$field} = get_post_meta($this->orderId, $this->prefix . $field, true);
        }
        return $this->attributes;
    }

    /**
     * Save model metas
     *
     * @return void
     */
    public function save()
    {
        foreach ($this->fields as $field) {
            if (!empty($this->attributes->{$field})) {
                update_post_meta($this->orderId, $this->prefix . $field, sanitize_text_field($this->attributes->{$field}));
            }
        }
    }

    /**
     * Update model metas
     *
     * @return void
     */
    public function update()
    {
        $this->save();
    }

    /**
     * Delete model metas
     *
     * @return void
     */
    public function delete()
    {
        foreach ($this->fields as $field) {
            if (!empty($this->attributes->{$field})) {
                delete_post_meta($this->orderId, $this->prefix . $field);
            }
        }
    }
}
