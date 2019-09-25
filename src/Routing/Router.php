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

    protected $menus = ['pages', 'subpages'];

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
            $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri])
            );
        }
        return $this;
    }

    public function doAction()
    {
        $controller = new $this->controller;
        $action = $this->action;

        return $controller->$action();
    }

    /**
     * Load and call the relevant controller action.
     *
     * @param string $controller
     * @param string $action
     */
    protected function callAction($controller, $action)
    {
        $this->controller = $controller;
        $this->action = $action;
        if (!method_exists($controller, $action)) {
            throw new Exception(
                "{$controller} does not respond to the {$action} action."
            );
        }

        add_action("admin_post_process_test", [$this, "doAction"]);
    }

    public function prefix($type, $callback)
    {
        if (!$type()) {
            return;
        }

        return $callback();
    }

    public function admin($callback)
    {
        $this->prefix('is_admin', $callback);
    }

    public function menuPage(string $pageTitle, string $menuTitle, string $capability, string $menuSlug, callable $function = null, string $iconUrl = "", int $position = null)
    {
        $this->menus['pages'][] = [
            'pageTitle' => $pageTitle,
            'menuTitle' => $menuTitle,
            'capability' => $capability,
            'menuSlug' => $menuSlug,
            'function' => $function,
            'iconUrl' => $iconUrl,
            'position' => $position
        ];
    }

    public function menuSubPage(string $parentSlug, string $pageTitle, string $menuTitle, string $capability, string $menuSlug, callable $function = null)
    {
        $this->menus['subpages'][] = [
            'parentSlug' => $parentSlug,
            'pageTitle' => $pageTitle,
            'menuTitle' => $menuTitle,
            'capability' => $capability,
            'menuSlug' => $menuSlug,
            'function' => $function
        ];
    }

    public function addMenus()
    {
        if (!empty($this->menus['pages'])) {
            foreach ($this->menus['pages'] as $page) {
                add_menu_page(
                    $page['pageTitle'],
                    $page['menuTitle'],
                    $page['capability'],
                    $page['menuSlug'],
                    $page['function'],
                    $page['iconUrl'],
                    $page['position']
                );
            }
        }
        if (!empty($this->menus['subpages'])) {
            foreach ($this->menus['subpages'] as $subPage) {
                add_submenu_page(
                    $subPage['parentSlug'],
                    $subPage['pageTitle'],
                    $subPage['menuTitle'],
                    $subPage['capability'],
                    $subPage['menuSlug'],
                    $subPage['function']
                );
            }
        }
    }

    public function createMenus()
    {
        if (!empty($this->menus['pages']) or !empty($this->menus['subpages'])) {
            add_action('admin_menu', [$this, 'addMenus']);
        }
    }
}
