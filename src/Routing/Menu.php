<?php

namespace Icarus\Routing;

/**
 * Wordpress admin menu
 */
class Menu
{
    /**
     * Menu pages
     *
     * @var array
     */
    protected $pages;

    /**
     * Menu subpages
     *
     * @var array
     */
    protected $subPages;

    /**
     * Register a menu page
     *
     * @param string $pageTitle
     * @param string $menuTitle
     * @param string $capability
     * @param string $menuSlug
     * @param callable $function
     * @param string $iconUrl
     * @param integer $position
     * @return void
     */
    public function page(string $pageTitle, string $menuTitle, string $capability, string $menuSlug, callable $function = null, string $iconUrl = "", int $position = null)
    {
        $this->pages[] = [
            'pageTitle' => $pageTitle,
            'menuTitle' => $menuTitle,
            'capability' => $capability,
            'menuSlug' => $menuSlug,
            'function' => $function,
            'iconUrl' => $iconUrl,
            'position' => $position
        ];
    }

    /**
     * Register a submenu page
     *
     * @param string $parentSlug
     * @param string $pageTitle
     * @param string $menuTitle
     * @param string $capability
     * @param string $menuSlug
     * @param callable $function
     * @return void
     */
    public function subPage(string $parentSlug, string $pageTitle, string $menuTitle, string $capability, string $menuSlug, callable $function = null)
    {
        $this->subPages[] = [
            'parentSlug' => $parentSlug,
            'pageTitle' => $pageTitle,
            'menuTitle' => $menuTitle,
            'capability' => $capability,
            'menuSlug' => $menuSlug,
            'function' => $function
        ];
    }

    /**
     * Add menu pages and subpages
     *
     * @return void
     */
    public function add()
    {
        if (!empty($this->pages)) {
            foreach ($this->pages as $page) {
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
        if (!empty($this->subPages)) {
            foreach ($this->subPages as $subPage) {
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

    /**
     * Create menus
     *
     * @return void
     */
    public function create()
    {
        if (!empty($this->pages) or !empty($this->subPages)) {
            add_action('admin_menu', [$this, 'add']);
        }
    }
}
