<?php

if (!function_exists("")) {
    function __(string $text, string $domain = null)
    {
        return $text;
    }
}

if (!function_exists("add_action")) {
    function add_action(string $tag, $function_to_add, int $priority = 10, int $accepted_args = 1)
    {
        if (is_array($function_to_add)) {
            call_user_func_array($function_to_add, []);
            return;
        }

        call_user_func($function_to_add);
    }
}

if (!function_exists("plugins_url")) {
    function plugins_url(string $path = '', string $plugin = '')
    {
        return $path;
    }
}

if (!function_exists("wp_enqueue_style")) {
    function wp_enqueue_style(string $handle, string $src = '', array $deps = [], $ver = false, string $media = 'all') {
        $handle = "";
        $src = "";
        return null;
    }
}

if (!function_exists("wp_enqueue_script")) {
    function wp_enqueue_script(string $handle, string $src = '', array $deps = [], $ver = false, bool $in_footer = false)
    {
        $handle = "";
        $src = "";
        return null;
    }
}

if (!function_exists("add_menu_page")) {
    function add_menu_page(string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = null, string $icon_url = '', int $position = null)
    {
        $page_title = "";
        $menu_title = "";
        $capability = "";
        $menu_slug = "";
        return null;
    }
}

if (!function_exists("add_submenu_page")) {
    function add_submenu_page(string $parent_slug, string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = null) {
        $parent_slug = "";
        $page_title = "";
        $menu_title = "";
        $capability = "";
        $menu_slug = "";
        return null;
    }
}
