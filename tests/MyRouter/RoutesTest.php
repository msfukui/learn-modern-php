<?php

declare (strict_types=1);

namespace LearnModernPhp\MyRouter;

use PHPUnit\Framework\TestCase;

final class RoutesTest extends TestCase
{
    private static $drawing_get;

    protected function setUp(): void
    {
        self::$drawing_get = function () {
            get('/', to: function () {
                return 'Hi, Router';
            });

            get('/hello', to: function () {
                return 'Hello world';
            });

            get('/hello/world', to: function () {
                return 'Hello, world!';
            });
        };
    }

    public function testRoutesForRoot(): void
    {
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_SERVER['REQUEST_URI'] = '/';

        Routes::draw(self::$drawing_get);

        $this->assertSame(200, http_response_code());
        $this->expectOutputString('Hi, Router');
    }

    public function testRoutesForHello(): void
    {
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_SERVER['REQUEST_URI'] = '/hello';

        Routes::draw(self::$drawing_get);

        $this->assertSame(200, http_response_code());
        $this->expectOutputString('Hello world');
    }

    public function testRoutesForHelloWorld(): void
    {
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_SERVER['REQUEST_URI'] = '/hello/world';

        Routes::draw(self::$drawing_get);

        $this->assertSame(200, http_response_code());
        $this->expectOutputString('Hello, world!');
    }
}
