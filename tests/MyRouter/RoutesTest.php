<?php

declare (strict_types=1);

namespace LearnModernPhp\MyRouter;

use PHPUnit\Framework\TestCase;

final class RoutesTest extends TestCase
{
    public function testRoutesForRoot(): void
    {
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_SERVER['REQUEST_URI'] = '/';

        Routes::draw(function () {

            get('/', to: function () {
                return 'Hi, Router';
            });

            get('/hello', to: function () {
                return 'Hello world';
            });
        });

        $this->assertSame(200, http_response_code());
        $this->expectOutputString('Hi, Router');
    }
}
