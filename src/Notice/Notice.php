<?php

namespace Icarus\Notice;

use Icarus\View\View;
use Icarus\Support\Facades\Session;

/**
 * Session notice flash message
 */
class Notice
{
    /**
     * Key notice
     *
     * @var string
     */
    protected $key = 'notice';

    /**
     * Constructor
     */
    public function __construct()
    {
        !@session_start();
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
        Session::set($this->key, $notice);
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
        Session::remove('notice');

        $viewPath = dirname(__FILE__) . "/views/";

        $view = new View;

        $view->setPath($viewPath);

        $view->render('notice', [
            'class' => "notice-{$notice['type']}",
            'message' => $notice['message'],
        ]);
    }
}
