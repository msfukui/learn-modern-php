<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\FizzBuzz;

use PHPUnit\Framework\TestCase;

final class HardCodeTest extends TestCase
{
    public static function FizzBuzzDataProviders(): array
    {
        return [
            'in 3'  => [3, 'Fizz'],
            'in 5'  => [5, 'Buzz'],
            'in 1'  => [1, '1'],
            'in 15' => [15, 'FizzBuzz'],
        ];
    }

    /**
     * @dataProvider FizzBuzzDataProviders
     */
    public function testFizzBuzz($param, $actual): void
    {
        $this->assertSame($actual, HardCode::fizz_buzz($param));
    }
}
