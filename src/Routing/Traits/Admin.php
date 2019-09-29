<?php

namespace Icarus\Routing\Traits;

/**
 * Admin trait
 */
trait Admin
{
    /**
     * Admin
     *
     * @return self
     */
    public function admin()
    {
        $this->admin = true;
        return $this;
    }
}
