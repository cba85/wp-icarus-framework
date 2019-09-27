<?php

namespace Icarus\Tests\Assets;

use PHPUnit\Framework\TestCase;
use Icarus\Support\Facades\Style;

final class StyleTest extends TestCase
{

    public function testAddStyle()
    {
        Style::setPath(__DIR__ . '/css')
            ->add('style1-name', 'style.css', [], false, 'all')
            ->add('style2-name', 'style2.css', [], false, 'all')
            ->save('wp_enqueue_style');
    }
}
