<?php

namespace Icarus\Routing;

use Exception;
use Icarus\Routing\Traits\Admin;

/**
 * Router
 */
class Router
{
    use Admin;

    protected $requestType;

    protected $controller;

    protected $method;

    protected $uri;

    protected $admin;

    /**
     * All registered routes.
     *
     * @var array
     */
    public $routes = [
        'GET' => [],
        'POST' => []
    ];

    /**
     * Load a user's routes file.
     *
     * @param string $file
     */
    public static function load($file)
    {
        $router = new static;
        require $file;
        return $router;
    }

    /**
     * Register a GET route.
     *
     * @param string $uri
     * @param string $controller
     */
    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = [
            'controller' => $controller
        ];
    }

    /**
     * Register a POST route.
     *
     * @param string $uri
     * @param string $controller
     */
    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = [
            'controller' => $controller
        ];
    }

    /**
     * Register a ACTION route.
     *
     * @param string $uri
     * @param string $action
     * @param string $controller
     * @return void
     */
    public function action($uri, $action, $controller)
    {
        $this->routes['POST'][$uri] = [
            'action' => $action,
            'controller' => $controller
        ];
    }

    /**
     * Load the requested URI's associated controller method.
     *
     * @param string $uri
     * @param string $requestType
     */
    public function direct($uri, $requestType)
    {
        $this->requestType = $requestType;
        $this->uri = $uri;

        if (array_key_exists($uri, $this->routes[$requestType])) {
            $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri]['controller'])
            );
        }

        return $this;
    }

    /**
     * Call the relevant controller method.
     *
     * @return callback
     */
    public function doAction()
    {
        $controller = new $this->controller;
        $method = $this->method;

        return $controller->$method();
    }

    /**
     * Load the relevant controller method.
     *
     * @param string $controller
     * @param string $method
     */
    protected function callAction($controller, $method)
    {
        $this->controller = $controller;
        $this->method = $method;
        if (!method_exists($controller, $method)) {
            throw new Exception(
                "{$controller} does not respond to the {$method} action."
            );
        }

        if ($this->admin and $this->requestType == 'POST') {
            add_action("admin_post_{$this->routes['POST'][$this->uri]['action']}", [$this, "doAction"]);
            return;
        }

        $this->doAction();

    }

}
