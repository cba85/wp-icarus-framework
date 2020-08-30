<?php

namespace Icarus\Tests\Notice;

use PHPUnit\Framework\TestCase;
use Icarus\Support\Facades\Flash;
use Icarus\Support\Facades\Session;

final class FlashTest extends TestCase
{
    /**
     * Test create a flash message
     *
     * @return void
     */
    public function testCreateFlashMessage()
    {
        $value = ['name' => 'Clément', 'email' => 'clement@test.com'];
        Flash::create('input', $value);
        $this->assertIsArray(Flash::get('input'));
        $this->assertArrayHasKey('name', Flash::get('input'));
        $this->assertEquals('Clément', Flash::get('input')['name']);
        $this->assertArrayHasKey('email', Flash::get('input'));
        $this->assertEquals('clement@test.com', Flash::get('input')['email']);
        $this->assertIsArray(Session::get('icarus-plugin-flash')['input']);
        $this->assertEquals($value, Session::get('icarus-plugin-flash')['input']);
    }
}
