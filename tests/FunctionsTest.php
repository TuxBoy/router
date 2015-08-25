<?php

namespace Stratify\Router\Test;

use Aura\Router\Route;

class FunctionsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function does_not_error_if_required_twice()
    {
        require __DIR__ . '/../src/functions.php';
        require __DIR__ . '/../src/functions.php';
    }

    /**
     * @test
     */
    public function route_returns_a_route_builder()
    {
        $builder = \Stratify\Router\route('/', 'controller');

        /** @var Route $route */
        $route = $builder->getRoute();

        $this->assertEquals('/', $route->path);
        $this->assertEquals('controller', $route->handler);
    }
}
