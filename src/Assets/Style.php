<?php

namespace Icarus\Assets;

use Exception;
use Icarus\Assets\Contracts\AssetInterface;

/**
 * Style
 */
class Style extends Asset implements AssetInterface
{
    protected $styles;

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
        $this->styles[] = [
            'handle' => $handle,
            'url' => $url,
            'deps' => $deps,
            'ver' => $ver,
            'media' => $media
        ];

        return $this;
    }

    /**
     * Add styles
     *
     * @return void
     */
    protected function addStyles() {
        foreach ($this->styles as $style) {
            wp_enqueue_style(
                $style['handle'],
                $style['url'],
                $style['deps'],
                $style['ver'],
                $style['media']);
        }
    }
}
