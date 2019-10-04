<?php

namespace Icarus\Tests\Assets;

use PHPUnit\Framework\TestCase;
use Icarus\Support\Facades\Style;
use Icarus\Support\Facades\Config;

final class StyleTest extends TestCase
{

    public function testAddStyle()
    {
        Style::setPath(Config::get('plugin')['styles'])
            ->add('style1-name', 'style.css', [], false, 'all')
            ->add('style2-name', 'style2.css', [], false, 'all')
            ->save('wp_enqueue_style');
    }
}
