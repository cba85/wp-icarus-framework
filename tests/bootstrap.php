<?php

use Icarus\Tests\Mocks\Wpdb;
use Icarus\Plugin;

require __DIR__ . '/../vendor/autoload.php';

// Spies
require __DIR__ . '/spies/wordpress.php';

// Mocks
$wpdb = new Wpdb;

$config = __DIR__ . '/plugin.php';
$plugin = new Plugin($config);
$plugin->bootstrap();
