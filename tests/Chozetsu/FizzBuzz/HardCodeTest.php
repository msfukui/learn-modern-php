<?php

declare(strict_types=1);

namespace LearnModernPhp\FizzBuzz;

use PHPUnit\Framework\TestCase;

final class HardCodeTest extends TestCase
{
    public function testFizzBuzzIn3(): void
    {
        $this->assertSame('Fizz', HardCode::fizz_buzz(3));
    }
}
