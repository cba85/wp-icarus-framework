<?php

namespace Icarus\Routing\Traits;

/**
 * Prefix
 */
trait Prefix
{
    /**
     * Prefix
     *
     * @var string
     */
    protected $prefix;

    /**
     * General prefix
     *
     * @param string $type
     * @param callback $callback
     * @return self
     */
    public function prefix($type, $callback)
    {
        $this->prefix = $type;

        if (!$type()) {
            return;
        }

        $callback();
        return $this;
    }

    /**
     * Admin prefix
     *
     * @param callback $callback
     * @return callback
     */
    public function admin($callback)
    {
        return $this->prefix('is_admin', $callback);
    }
}
