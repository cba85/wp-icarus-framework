<?php

namespace Icarus\Tests\Assets;

use Icarus\Assets\Script;
use PHPUnit\Framework\TestCase;

final class ScriptTest extends TestCase
{

    public function testAddScript()
    {
        (new Script)->setPath(__DIR__ . '/js')
            ->add('scripts', 'scripts.js', [], false, true)
            ->add('admin', 'admin.js', [], false, true)
            ->save('wp_enqueue_script');
    }
}
