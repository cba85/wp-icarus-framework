<?php

namespace Icarus\Models\Contracts;

/**
 * Model interface
 */
interface ModelInterface
{
    public function get();
    public function save();
    public function delete();
    public function update();
}
