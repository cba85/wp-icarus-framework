<?php

$router->action('/test.php?page=test', 'process_test', '\Icarus\Tests\Mocks\AdminController@save');
$router->get('/test.php?page=test','\Icarus\Tests\Mocks\AdminController@index');
