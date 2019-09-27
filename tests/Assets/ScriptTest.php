<?php

namespace Icarus\Tests\Assets;

use PHPUnit\Framework\TestCase;
use Icarus\Support\Facades\Script;

final class ScriptTest extends TestCase
{

    public function testAddScript()
    {
        Script::setPath(__DIR__ . '/js')
            ->add('scripts', 'scripts.js', [], false, true)
            ->add('admin', 'admin.js', [], false, true)
            ->save('wp_enqueue_script');
    }
}
