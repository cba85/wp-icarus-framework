<?php

namespace Icarus\Admin;

/**
 * Admin class
 */
class Admin
{
    // Action
    public function action(string $action, callable $controller)
    {
        add_action("admin_post_{$action}", $controller);
    }
}
