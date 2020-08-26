<?php

namespace Icarus\Tests\Assets;

use Icarus\Assets\Style;
use PHPUnit\Framework\TestCase;


final class StyleTest extends TestCase
{

    public function testAddStyle()
    {
        (new Style)->setPath(__DIR__ . '/css')
            ->add('style1-name', 'style.css', [], false, 'all')
            ->add('style2-name', 'style2.css', [], false, 'all')
            ->save('wp_enqueue_style');
    }
}
