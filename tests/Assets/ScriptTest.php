<?php

namespace Icarus\Tests\Assets;

use PHPUnit\Framework\TestCase;
use Icarus\Support\Facades\Script;
use Icarus\Support\Facades\Config;

final class ScriptTest extends TestCase
{

    public function testAddScript()
    {
        Script::setPath(Config::get('plugin')['scripts'])
            ->add('scripts', 'scripts.js', [], false, true)
            ->add('admin', 'admin.js', [], false, true)
            ->save('wp_enqueue_script');
    }
}
