<?php

declare (strict_types=1);

namespace LearnModernPhp\Testable;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class AdderTest extends TestCase
{
    private Adder $adder;

    public static function addProvider(): array
    {
        return [
            'first'  => [1, 2, 3],
            'second' => [100, 200, 300],
        ];
    }

    protected function setUp(): void
    {
        $this->adder = new Adder();
    }

    #[DataProvider('addProvider')]
    public function testAdd(int $a, int $b, int $expected): void
    {
        $this->assertSame($expected, $this->adder->add($a, $b));
    }
}
