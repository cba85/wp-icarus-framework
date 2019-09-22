<?php
namespace Icarus\Tests\View;

use Exception;
use PHPUnit\Framework\TestCase;
use Icarus\Support\Facades\View;

final class ViewTest extends TestCase {

    protected $path = __DIR__ . '/views/';

    public function testFileNotFound()
    {
        $this->expectException(Exception::class);
        View::setPath($this->path)->render('error');
    }

    public function testViewRenderWithoutData()
    {
        $render = View::setPath($this->path)->make('test');
        $this->assertSame("Hello world! ", $render);
    }

    public function testViewRenderWithData()
    {
        $render = View::setPath($this->path)->make('test', ['test' => "test"]);
        $this->assertSame("Hello world! test", $render);
    }
}
