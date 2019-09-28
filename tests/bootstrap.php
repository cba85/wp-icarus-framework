<?php

use Icarus\Tests\Mocks\Wpdb;

require __DIR__ . '/../vendor/autoload.php';

// Spies
require __DIR__ . '/spies/wordpress.php';

// Mocks
$wpdb = new Wpdb;
