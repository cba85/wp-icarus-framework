<?php

namespace Icarus\Models\Contracts;

/**
 * Table interface
 */
interface TableInterface
{
    public function table();
    public function key();
    public function fields();
}
