<?php

namespace Icarus\Assets;

use Icarus\Assets\Traits\Url;

/**
 * Asset
 */
abstract class Asset
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
            $this->setPath($path);
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
     * Reset assets previously enqueuded
     *
     * @return void
     */
    public function resetAssetsEnqueued()
    {
        $this->styles = [];
        $this->scripts = [];
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
        $this->resetAssetsEnqueued();
    }

    /**
     * Save assets
     *
     * @return void
     */
    public function save($tag)
    {
        if (!$tag) {
            return;
        }
        add_action($tag, [$this, 'addAssets']);
    }
}
