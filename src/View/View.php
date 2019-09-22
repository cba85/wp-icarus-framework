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
    public static $path;

    public static function getFile($filename)
    {
        $file = static::$path . $filename . '.php';

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
    public static function render($filename, array $data = null)
    {
        $file = self::getFile($filename);

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
    public static function make($filename, array $data = null)
    {
        $file = self::getFile($filename);

        if ($data) {
            extract($data);
        }

        ob_start();
        include $file;
        $content = ob_get_clean();
        return $content;
    }
}
