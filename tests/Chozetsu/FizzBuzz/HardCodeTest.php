<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\FizzBuzz;

use PHPUnit\Framework\TestCase;

final class HardCodeTest extends TestCase
{
    public function testFizzBuzzIn3(): void
    {
        $this->assertSame('Fizz', HardCode::fizz_buzz(3));
    }

    public function testFizzBuzzIn5(): void
    {
        $this->assertSame('Buzz', HardCode::fizz_buzz(5));
    }

    public function testFizzBuzzIn1(): void
    {
        $this->assertSame('1', HardCode::fizz_buzz(1));
    }

    public function testFizzBuzzIn15(): void
    {
        $this->assertSame('FizzBuzz', HardCode::fizz_buzz(15));
    }
}
