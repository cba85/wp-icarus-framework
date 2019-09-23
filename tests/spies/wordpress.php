<?php

if (!function_exists("")) {
    function __(string $text, string $domain = null)
    {
        return $text;
    }
}

if (!function_exists("add_action")) {
    function add_action(string $tag, callable $function_to_add, int $priority = 10, int $accepted_args = 1)
    {
        $tag = "";
        $function_to_add = null;
        return null;
    }
}

if (!function_exists("add_menu_page")) {
    function add_menu_page(string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = null, string $icon_url = '', int $position = null)
    {
        $page_title= "";
        $menu_title = "";
        $capability = "";
        $menu_slug = "";
        return null;
    }
}
