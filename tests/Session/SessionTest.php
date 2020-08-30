<?php

namespace Icarus\Tests\Notice;

use PHPUnit\Framework\TestCase;
use Icarus\Support\Facades\Session;

final class SessionTest extends TestCase
{
    /**
     * Test if session exists
     *
     * @return void
     */
    public function testIfSessionExists()
    {
        $exists = Session::has('test');
        $this->assertFalse($exists);
        $_SESSION['test'] = "test";
        $exists = Session::has('test');
        $this->assertTrue($exists);
    }

    /**
     * Test push session
     *
     * @return void
     */
    public function testPushSession()
    {
        Session::set('test', 'test2');
        $this->assertEquals('test2', Session::get('test'));
    }

    /**
     * Test remove session key
     *
     * @return void
     */
    public function testRemoveSessionKey()
    {
        Session::remove('test');
        $this->assertNull(Session::get('test'));
    }

    /**
     * Test get session key
     *
     * @return void
     */
    public function testGetSessionKey()
    {
        $value = Session::get('test');
        $this->assertNull($value);
        $_SESSION['test'] = "test";
        $value = Session::get('test');
        $this->assertEquals('test', $value);
    }

    /**
     * Test get all session
     *
     * @return void
     */
    public function testGetAllSession()
    {
        Session::set('test1', 'test1');
        Session::set('test2', 'test2');
        $session = Session::all();
        $this->assertIsArray($session);
        $this->assertArrayHasKey('test1', $session);
        $this->assertArrayHasKey('test2', $session);
        $this->assertEquals('test1', $session['test1']);
        $this->assertEquals('test2', $session['test2']);
    }

    /**
     * Test flush sessions
     *
     * @return void
     */
    public function testFlushSessions()
    {
        Session::flush();
        $this->assertEmpty($_SESSION);
    }
}
