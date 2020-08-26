<?php

namespace Icarus\Tests\View;

use Exception;
use Icarus\View\View;
use PHPUnit\Framework\TestCase;


final class ViewTest extends TestCase
{

    protected $view;

    public function setUp(): void
    {
        $this->view = new View;
        $this->view->setPath(__DIR__ . '/views/');
    }

    public function testFileNotFound()
    {
        $this->expectException(Exception::class);
        $this->view->render('error');
    }

    public function testViewRenderWithoutData()
    {
        $render = $this->view->make('test');
        $this->assertSame("Hello world! ", $render);
    }

    public function testViewRenderWithData()
    {
        $render = $this->view->make('test', ['test' => "test"]);
        $this->assertSame("Hello world! test", $render);
    }
}
