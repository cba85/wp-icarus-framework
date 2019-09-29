<?php

namespace Icarus\Menu;

/**
 * Wordpress Menu class
 */
class Menu
{
    /**
     * Menu pages
     *
     * @var array
     */
    protected $pages = [];

    /**
     * Menu sub pages
     *
     * @var array
     */
    protected $subPages = [];

    /**
     * Add menu page
     *
     * @param string $pageTitle
     * @param string $menuTitle
     * @param string $capability
     * @param string $menuSlug
     * @param callable $function
     * @param string $iconUrl
     * @param integer $position
     * @return self
     */
    public function addPage(string $pageTitle, string $menuTitle, string $capability, string $menuSlug, callable $function = null, string $iconUrl = "", int $position = null)
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
        return $this;
    }

    /**
     * Add sub menu page
     *
     * @param string $parentSlug
     * @param string $pageTitle
     * @param string $menuTitle
     * @param string $capability
     * @param string $menuSlug
     * @param callable $function
     * @return self
     */
    public function addSubPage(string $parentSlug, string $pageTitle, string $menuTitle, string $capability, string $menuSlug, callable $function = null)
    {
        $this->subPages[] = [
            'parentSlug' => $parentSlug,
            'pageTitle' => $pageTitle,
            'menuTitle' => $menuTitle,
            'capability' => $capability,
            'menuSlug' => $menuSlug,
            'function' => $function
        ];
        return $this;
    }

    /**
     * Add menu
     *
     * @return void
     */
    public function addMenu()
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
     * Create menu
     *
     * @param callable $function
     * @return void
     */
    public function create(callable $function = null)
    {
        if ($function) {
            $function();
        }
        if (!empty($this->pages) or !empty($this->subPages)) {
            add_action('admin_menu', [$this, 'addMenu']);
        }
    }
}
