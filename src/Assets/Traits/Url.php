<?php

namespace Icarus\Assets\Traits;

/**
 * URL
 */
trait Url
{
    /**
     * Generate the plugin url
     *
     * @param string $src
     * @return string
     */
    public function generateUrl(string $src)
    {
        $url = plugin_dir_url("{$this->path}/{$src}");
        return "{$url}/{$src}";
    }
}
