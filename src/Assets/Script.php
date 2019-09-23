<?php

namespace Icarus\Assets;

use Exception;
use Icarus\Assets\Contracts\AssetInterface;

/**
 * Script
 */
class Script extends Asset implements AssetInterface
{
    /**
     * Add a script
     *
     * @param string $handle
     * @param string $src
     * @param array $deps
     * @param boolean $ver
     * @param boolean $in_footer
     * @return self
     */
    public function add(string $handle, string $src = '', array $deps = [], $ver = false, bool $in_footer = false)
    {
        if (!$this->path) {
            throw new Exception("No path defined for script files.");
        }

        $url = $this->generateUrl($src);
        wp_enqueue_script($handle, $url, $deps, $ver, $in_footer);

        return $this;
    }
}
