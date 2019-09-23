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
        return plugins_url("{$this->path}/{$src}", __FILE__);
    }
}
