<?php

namespace Icarus\Tests\Notice;

use PHPUnit\Framework\TestCase;
use Icarus\Support\Facades\Notice;
use Icarus\Support\Facades\Session;

final class NoticeTest extends TestCase
{

    protected $key = "icarus-framework";

    public function testNoticeTypeCreation()
    {
        Notice::create('success', "Success test");
        $this->assertArrayHasKey("type", $_SESSION[$this->key]['notice']);
    }

    public function testNoticeMessageCreation()
    {
        Notice::create('success', "Success test");
        $this->assertArrayHasKey("message", $_SESSION[$this->key]['notice']);
    }

    public function testNoticeCorrectTypeCreation()
    {
        $type = "success";
        Notice::create($type, "Success test");
        $this->assertArrayHasKey("type", $_SESSION[$this->key]['notice']);
        $this->assertArrayHasKey("message", $_SESSION[$this->key]['notice']);
        $this->assertEquals($type, $_SESSION[$this->key]['notice']['type']);
    }

    public function testNoticeCorrectMessageCreation()
    {
        $message = "Success test";
        Notice::create("success", $message);
        $this->assertArrayHasKey("type", $_SESSION[$this->key]['notice']);
        $this->assertArrayHasKey("message", $_SESSION[$this->key]['notice']);
        $this->assertEquals($message, $_SESSION[$this->key]['notice']['message']);
    }

    public function testNoticeRemoveSessionAfterDisplay()
    {
        Notice::display();
        //print_r($_SESSION);
        $this->assertArrayNotHasKey('notice', $_SESSION[$this->key]);
    }
}
