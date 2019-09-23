<?php

namespace Icarus\Tests\Assets;

use PHPUnit\Framework\TestCase;
use Icarus\Support\Facades\Script;

final class ScriptTest extends TestCase
{

    public function testAddScript()
    {
        Script::setPath(__DIR__ . '/js/scripts.js')
            ->add('style1-name', 'style.css', [], false, 'all')
            ->add('style2-name', 'style2.css', [], false, 'all');
    }
}
