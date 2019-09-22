<?php

namespace Icarus\Tests\Notice;

use PHPUnit\Framework\TestCase;
use Icarus\Support\Facades\Notice;

final class NoticeTest extends TestCase
{

    protected $key = "icarus-framework";

   public function testNoticeTypeCreation()
   {
        Notice::setKey($this->key)->create('success', "Success test");
        $this->assertArrayHasKey("type", $_SESSION[$this->key]);
   }

    public function testNoticeMessageCreation()
    {
        Notice::setKey($this->key)->create('success', "Success test");
        $this->assertArrayHasKey("message", $_SESSION[$this->key]);
    }

    public function testNoticeCorrectTypeCreation()
    {
        $type = "success";
        Notice::create($type, "Success test");
        $this->assertEquals($type, $_SESSION[$this->key]['type']);
    }

    public function testNoticeCorrectMessageCreation()
    {
        $message = "Success test";
        Notice::create("success", $message);
        $this->assertEquals($message, $_SESSION[$this->key]['message']);
    }

    public function testNoticeRemoveSessionAfterDisplay()
    {
        Notice::display();
        $this->assertArrayNotHasKey($this->key, $_SESSION);
    }
}
