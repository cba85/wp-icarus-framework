<?php

namespace Icarus\Models\Tables;

use Icarus\Models\Contracts\MetaInterface;
use Icarus\Models\Contracts\ModelInterface;
use Icarus\Models\Model;

abstract class Meta extends Model implements ModelInterface, MetaInterface
{
    /**
     * Meta post id
     *
     * @var int
     */
    protected $postId = null;

    /**
     * Option prefix
     *
     * @var string
     */
    protected $prefix;

    /**
     * Option keys
     *
     * @var array
     */
    protected $fields;

    /**
     * Meta constructor
     *
     * @param int $postId
     */
    public function __construct(int $postId)
    {
        parent::__construct();
        $this->postId = $postId;
        $this->setPrefix();
        $this->setFields();
    }

    /**
     * Set option prefix
     *
     * @return string
     */
    protected function setPrefix()
    {
        $this->prefix = $this->prefix();
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
     * Get model metas
     *
     * @return void
     */
    public function get()
    {
        foreach ($this->fields as $field) {
            $this->attributes->{$field} = get_post_meta($this->postId, $this->prefix . $field, true);
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
                update_post_meta($this->postId, $this->prefix . $field, sanitize_text_field($this->attributes->{$field}));
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
                delete_post_meta($this->postId, $this->prefix . $field);
                $this->attributes->$field = null;
            }
        }
    }
}
