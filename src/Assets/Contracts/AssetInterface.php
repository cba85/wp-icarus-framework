<?php

namespace Icarus\Assets\Contracts;

/**
 * Asset interface
 */
interface AssetInterface
{
    public function setPath(string $path);
    public function getPath();
    public function save(string $tag);
}
