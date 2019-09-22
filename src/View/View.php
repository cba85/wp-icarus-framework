<?php

namespace Icarus\View;

use Exception;

/**
 * View class
 */
class View
{
    /**
     * Path of wiew files
     *
     * @var string
     */
    protected $path;

    /**
     * Get path of view files
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set view files path
     *
     * @param string $path
     * @return View
     */
    public function setPath(string $path)
    {
        $this->path = $path;

        return $this;
    }

    public function getFile(string $filename)
    {
        $file = $this->path . $filename . '.view.php';

        if (!file_exists($file)) {
            throw new Exception("No page {$filename} found.");
        }

        return $file;
    }

    /**
     * Render a view file
     *
     * @param string $filename
     * @param array $data
     * @return void
     */
    public function render(string $filename, array $data = null)
    {
        $file = $this->getFile($filename);

        if ($data) {
            extract($data);
        }

        return include $file;
    }

    /**
     * Make a view file
     *
     * @param string $filename
     * @param array $data
     * @return string
     */
    public function make(string $filename, array $data = null)
    {
        $file = $this->getFile($filename);

        if ($data) {
            extract($data);
        }

        ob_start();
        include $file;
        $content = ob_get_clean();
        return $content;
    }
}
