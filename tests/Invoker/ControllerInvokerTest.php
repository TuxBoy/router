<?php

namespace Stratify\Router\Test\Invoker;

use Stratify\Router\Invoker\ControllerInvoker;
use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequest;

class ControllerInvokerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function allows_controllers_to_return_string()
    {
        $container = $this->getMockForAbstractClass('Interop\Container\ContainerInterface');
        $invoker = new ControllerInvoker($container);

        $middleware = function () {
            return 'Hello world!';
        };

        $request = new ServerRequest([], [], '/', 'GET');
        $response = new Response;
        $next = function () {};
        $newResponse = $invoker->invoke($middleware, $request, $response, $next);

        $this->assertEquals('Hello world!', $newResponse->getBody()->__toString());
        $this->assertSame($response, $newResponse);
    }
}
