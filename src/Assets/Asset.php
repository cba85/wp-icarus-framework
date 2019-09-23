<?php

namespace Icarus\Assets;

use Icarus\Assets\Traits\Url;

/**
 * Asset
 */
class Asset
{
    use Url;

    /**
     * Path of the files
     *
     * @var string
     */
    protected $path;

    /**
     * Get path of the files
     *
     * @return  string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set path of the script public files
     *
     * @param  string  $path  Path of the script public files
     *
     * @return  self
     */
    public function setPath(string $path)
    {
        $this->path = $path;
        return $this;
    }
}
