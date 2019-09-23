<?php

namespace Icarus\Routing;

use Exception;

/**
 * Router
 */
class Router
{
    protected $controller;

    protected $action;
    /**
     * Create the menu
     *
     * @return void
     */
    public function addMenu()
    {
        add_menu_page(
            Config::get('plugin')['admin_menus']['wc-mondialrelay']['page'],
            Config::get('plugin')['admin_menus']['wc-mondialrelay']['menu'],
            'manage_woocommerce',
            'wc-mondialrelay',
            function () {
                return $this->controller->dispatch();
            },
            'dashicons-location',
            Config::get('plugin')['menu_position']
        );
        add_submenu_page(
            'wc-mondialrelay',
            Config::get('plugin')['admin_menus']['wc-mondialrelay-webservice']['page'],
            Config::get('plugin')['admin_menus']['wc-mondialrelay-webservice']['menu'],
            'manage_woocommerce',
            'wc-mondialrelay-webservice',
            function () {
                return (new AdminController)->route('wc-mondialrelay-webservice');
            }
        );
        add_submenu_page(
            'wc-mondialrelay',
            Config::get('plugin')['admin_menus']['wc-mondialrelay-settings']['page'],
            Config::get('plugin')['admin_menus']['wc-mondialrelay-settings']['menu'],
            'manage_woocommerce',
            'wc-mondialrelay-settings',
            function () {
                return (new AdminController)->route('wc-mondialrelay-settings');
            }
        );
        add_submenu_page(
            'wc-mondialrelay',
            Config::get('plugin')['admin_menus']['wc-mondialrelay-status']['page'],
            Config::get('plugin')['admin_menus']['wc-mondialrelay-status']['menu'],
            'manage_woocommerce',
            'wc-mondialrelay-status',
            function () {
                return (new AdminController)->route('wc-mondialrelay-status');
            }
        );
    }

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
        $this->routes['GET'][$uri] = $controller;
    }

    /**
     * Register a POST route.
     *
     * @param string $uri
     * @param string $controller
     */
    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    /**
     * Load the requested URI's associated controller method.
     *
     * @param string $uri
     * @param string $requestType
     */
    public function direct($uri, $requestType)
    {
        if (array_key_exists($uri, $this->routes[$requestType])) {
            return $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri])
            );
        }
        throw new Exception('No route defined for this URI.');
    }

    /**
     * Load and call the relevant controller action.
     *
     * @param string $controller
     * @param string $action
     */
    protected function callAction($controller, $action)
    {
        $this->controller = new $controller;

        if (!method_exists($controller, $action)) {
            throw new Exception(
                "{$controller} does not respond to the {$action} action."
            );
        }

        add_action('admin_menu', [$this, 'addMenu']);
    }

    public function slug()
    {
        return $this;
    }
}
