<?php

namespace Icarus\Models\Contracts;

interface ModelInterface
{
    public function get();
    public function save();
    public function delete();
    public function update();
}
