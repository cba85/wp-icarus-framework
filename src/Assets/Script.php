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
     * Scripts
     *
     * @var array
     */
    protected $scripts = [];

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
        $url = $this->generateUrl($src);
        $this->scripts[] = [
            'handle' => $handle,
            'url' => $url,
            'deps' => $deps,
            'ver' => $ver,
            'in_footer' => $in_footer
        ];

        return $this;
    }

    /**
     * Add scripts
     *
     * @return void
     */
    protected function addScripts()
    {
        foreach ($this->scripts as $script) {
            wp_enqueue_script(
                $script['handle'],
                $script['url'],
                $script['deps'],
                $script['ver'],
                $script['in_footer']
            );
        }
    }
}
