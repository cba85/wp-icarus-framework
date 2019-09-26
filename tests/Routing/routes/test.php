<?php

$router->admin(function() use ($router) {
    $router->menu->page(
        'WP Icarus page',
        'WP Icarus page',
        'manage_options',
        'wp-icarus',
        function () {
            return (new \Icarus\Tests\Mocks\AdminController)->index();
        },
        'dashicons-admin-page',
        58
    );

    $router->menu->subPage(
        'wp-icarus',
        'WP Icarus subpage',
        'WP Icarus subpage',
        'manage_options',
        'wp-icarus-2',
        function () {
            return (new \Icarus\Tests\Mocks\AdminController)->index();
        }
    );
});

$router->prefix('is_admin', function () use ($router) {
    $router->action('/test.php?page=test', 'process_test', '\Icarus\Tests\Mocks\AdminController@save');
});

$router->get('/test.php?page=test','\Icarus\Tests\Mocks\AdminController@index');
