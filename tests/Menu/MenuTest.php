<?php

namespace Icarus\Tests\Menu;

use PHPUnit\Framework\TestCase;
use Icarus\Support\Facades\Menu;

final class MenuTest extends TestCase
{

    public function testAddMenuPage()
    {
        Menu::addPage('page', 'menu', 'capability', 'slug', function () {
            return (new \Icarus\Tests\Mocks\AdminController)->index();
        });
    }

    public function testAddMenuSubPage()
    {
        Menu::addSubPage('parent', 'page', 'menu', 'capability', 'slug', function () {
            return (new \Icarus\Tests\Mocks\AdminController)->index();
        });
    }

    public function testAddMenuPageAndCreateMenus()
    {
        Menu::addPage('page', 'menu', 'capability', 'slug', function () {
            return (new \Icarus\Tests\Mocks\AdminController)->index();
        })->create();
    }

    public function testAddMenuSubPageAndCreateMenus()
    {
        Menu::addSubPage('parent', 'page', 'menu', 'capability', 'slug', function () {
            return (new \Icarus\Tests\Mocks\AdminController)->index();
        })->create();
    }

    public function testAddMenuPages()
    {
        Menu::addPage('page', 'menu', 'capability', 'slug1', function () {
            return (new \Icarus\Tests\Mocks\AdminController)->index();
        });
        Menu::addPage('page', 'menu', 'capability', 'slug2', function () {
            return (new \Icarus\Tests\Mocks\AdminController)->index();
        });
    }

    public function testAddMenuSubPages()
    {
        Menu::addSubPage('parent', 'page', 'menu', 'capability', 'slug', function () {
            return (new \Icarus\Tests\Mocks\AdminController)->index();
        });
        Menu::addSubPage('parent', 'page', 'menu', 'capability', 'slug', function () {
            return (new \Icarus\Tests\Mocks\AdminController)->index();
        });
    }

    public function testAddMenuPagesAndSubPages()
    {
        Menu::addPage('page', 'menu', 'capability', 'slug', function () {
            return (new \Icarus\Tests\Mocks\AdminController)->index();
        });
        Menu::addSubPage('parent', 'page', 'menu', 'capability', 'slug', function () {
            return (new \Icarus\Tests\Mocks\AdminController)->index();
        });
    }

    public function testAddMenuPagesAndSubPagesAndCreateMenu()
    {
        Menu::create(function () {
            Menu::addPage('page', 'menu', 'capability', 'slug', function () {
                return (new \Icarus\Tests\Mocks\AdminController)->index();
            });
            Menu::addSubPage('parent', 'page', 'menu', 'capability', 'slug', function () {
                return (new \Icarus\Tests\Mocks\AdminController)->index();
            });
        });
    }
}
