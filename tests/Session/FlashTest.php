<?php

namespace Icarus\Tests\Notice;

use PHPUnit\Framework\TestCase;
use Icarus\Support\Facades\Flash;
use Icarus\Support\Facades\Session;

final class FlashTest extends TestCase
{
    /**
     * Test value
     *
     * @var array
     */
    protected $value = ['name' => 'Clément', 'email' => 'clement@test.com'];

    /**
     * Test create a flash message
     *
     * @return void
     */
    public function testCreateFlashMessage()
    {
        Flash::create('input', $this->value);
        $this->assertIsArray(Flash::get('input'));
        $this->assertArrayHasKey('name', Flash::get('input'));
        $this->assertEquals('Clément', Flash::get('input')['name']);
        $this->assertArrayHasKey('email', Flash::get('input'));
        $this->assertEquals('clement@test.com', Flash::get('input')['email']);
        $this->assertIsArray(Session::get('icarus-plugin-flash')['input']);
        $this->assertEquals($this->value, Session::get('icarus-plugin-flash')['input']);
    }

    /**
     * Test get flash message
     *
     * @return void
     */
    public function testGetFlashMessage()
    {
        $this->assertIsArray(Flash::get('input'));
        $this->assertArrayHasKey('name', Flash::get('input'));
        $this->assertEquals('Clément', Flash::get('input')['name']);
        $this->assertArrayHasKey('email', Flash::get('input'));
        $this->assertEquals('clement@test.com', Flash::get('input')['email']);
        $this->assertIsArray(Session::get('icarus-plugin-flash')['input']);
        $this->assertEquals($this->value, Session::get('icarus-plugin-flash')['input']);
    }
}
