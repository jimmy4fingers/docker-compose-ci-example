<?php

namespace Test\Unit\App\Controller;

use App\Controller\Controller;
use Codeception\Test\Unit;
use Slim\Http\Request;
use Slim\Http\Response;

class ControllerTest extends Unit
{
    public function testInvoke()
    {
        $expected = ['result' => 'ok'];
        $controller = new Controller();

        $request = $this->getMockBuilder(Request::class)
            ->disableOriginalConstructor()
            ->getMock();
        $response = $this->getMockBuilder(Response::class)
            ->disableOriginalConstructor()
            ->setMethods(['withJson'])
            ->getMock();

        $response
            ->expects($this->exactly(1))
            ->method('withJson')
            ->willReturn(json_encode($expected));

        $actual = $controller->__invoke($request, $response);
        $this->assertSame($expected, json_decode($actual, true));
    }
}
