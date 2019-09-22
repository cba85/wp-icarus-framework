<?php
namespace Icarus\Tests\View;

use Exception;
use PHPUnit\Framework\TestCase;
use Icarus\View\View;

final class ViewTest extends TestCase {

    public function testFileNotFound()
    {
        $this->expectException(Exception::class);
        View::render('error');
    }

    public function testViewRenderWithoutData()
    {
        $render = View::make('test');
        $this->assertSame("Hello world! ", $render);
    }

    public function testViewRenderWithData()
    {
        $render = View::make('test', ['test' => "test"]);
        $this->assertSame("Hello world! test", $render);
    }
}
