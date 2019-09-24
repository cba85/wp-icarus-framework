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
     * You can directly pass the path in the constructor if you don't use the facade
     *
     * @param string $path
     */
    public function __construct(string $path = null)
    {
        if ($path) {
            $this->path = $path;
        }
    }

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

    /**
     * Add all assets (styles or scripts)
     *
     * @return void
     */
    public function addAssets()
    {
        $calledClass = explode('\\', get_called_class());
        $class = end($calledClass);
        switch ($class) {
            case 'Style':
                $this->addStyles();
                break;
            case 'Script':
                $this->addScripts();
                break;
        }
    }

    /**
     * Save assets
     *
     * @return void
     */
    public function save($tag = 'wp_enqueue_scripts')
    {
        add_action($tag, [$this, 'addAssets']);
    }
}
