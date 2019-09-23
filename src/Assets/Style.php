<?php

namespace Icarus\Assets;

use Exception;
use Icarus\Assets\Contracts\AssetInterface;

/**
 * Style
 */
class Style extends Asset implements AssetInterface
{
    /**
     * Add a style
     *
     * @param string $handle
     * @param string $src
     * @param array $deps
     * @param boolean $ver
     * @param string $media
     * @return self
     */
    public function add(string $handle, string $src = '', array $deps = [], $ver = false, string $media = 'all')
    {
        if (!$this->path) {
            throw new Exception("No path defined for style files.");
        }

        $url = $this->generateUrl($src);
        wp_enqueue_style($handle, $url, $deps, $ver, $media);

        return $this;
    }
}
