<?php

use Icarus\Tests\Mocks\Wpdb;
use Icarus\Plugin;

require __DIR__ . '/../vendor/autoload.php';

// Spies
require __DIR__ . '/spies/wordpress.php';

// Mocks
$wpdb = new Wpdb;

$plugin = new Plugin;
