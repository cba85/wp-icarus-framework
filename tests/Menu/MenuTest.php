<?php

namespace Icarus\Tests\Config;

use PHPUnit\Framework\TestCase;
use Icarus\Support\Facades\Menu;

final class MenuTest extends TestCase
{

    public function testAddPage()
    {
        Menu::addPage('page', 'menu', 'capability', 'slug')
            ->create();
    }

    public function testAddPages()
    {
        Menu::addPage('page', 'menu', 'capability', 'slug')
            ->addPage('page', 'menu', 'capability', 'slug')
            ->create();
    }

    public function testAddSubPage()
    {
        Menu::addSubPage('parent', 'page', 'menu', 'capability', 'slug')
            ->create();
    }

    public function testAddSubPages()
    {
        Menu::addSubPage('parent', 'page', 'menu', 'capability', 'slug')
            ->addSubPage('parent', 'page', 'menu', 'capability', 'slug')
            ->create();
    }

    public function addPagesAndSubPages()
    {
        Menu::addPage('page', 'menu', 'capability', 'slug')
            ->addSubPage('parent', 'page', 'menu', 'capability', 'slug')
            ->create();
    }
}
