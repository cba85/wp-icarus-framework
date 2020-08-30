<?php

namespace Icarus\Notice;

use Icarus\Support\Facades\Session;
use Icarus\View\View;

/**
 * Session notice flash message
 */
class Notice
{
    /**
     * Session key for flash notice
     */
    protected $key;

    /**
     * Constructor
     */
    public function __construct()
    {
        !@session_start();
    }

    /**
     * Get notice session key
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set notice session key
     *
     * @param string $key
     * @return void
     */
    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }

    /**
     * Create a notice message
     *
     * @param string $type
     * @param string $message
     * @return void
     */
    public function create($type, $message)
    {
        $notice = [
            'type' => $type,
            'message' => $message,
        ];
        Session::push($this->key, $notice);
    }

    /**
     * Display notice message
     *
     * @return string
     */
    public function display()
    {
        if (!Session::has($this->key)) {
            return null;
        }

        $notice = Session::get($this->key);
        Session::remove($this->key);

        $viewPath = dirname(__FILE__) . "/views/";

        $view = new View;

        $view->setPath($viewPath);

        $view->render('notice', [
            'class' => "notice-{$notice['type']}",
            'message' => $notice['message'],
        ]);
    }
}
