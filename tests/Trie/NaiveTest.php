<?php

declare (strict_types=1);

namespace LearnModernPhp\Trie;

use PHPUnit\Framework\TestCase;

final class NaiveTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testRunForEmpty(): void
    {
        $this->assertEquals([], Naive::run('GET', '/', []));
    }

    public function testRun(): void
    {
        $tree = [
            'GET' => [
                '/' => [
                    'Function' => function () { return "Hi, Router"; }
                ],
                '/hello' => [
                    'Function' => function () { return "Hello World"; },
                    '/world' => [
                        'Function' => function () { return "Hello, World!"; }
                    ]
                ],
            ]
        ];

        $this->assertEquals(
            [
                'Function' => function () { return "Hi, Router"; }
            ],
            Naive::run('GET', '/', $tree)
        );

        $this->assertEquals(
            [
                'Function' => function () { return "Hello world"; }
            ],
            Naive::run('GET', '/hello', $tree)
        );

        $this->assertEquals(
            [
                'Function' => function () { return "Hello world"; }
            ],
            Naive::run('GET', '/hello/world', $tree)
        );

        $this->assertEquals(
            [],
            Naive::run('GET', '/hello/world/piece', $tree)
        );

        $this->assertEquals(
            [],
            Naive::run('GET', '/none', $tree)
        );

        $this->assertEquals(
            [],
            Naive::run('POST', '/', $tree)
        );
    }
}
