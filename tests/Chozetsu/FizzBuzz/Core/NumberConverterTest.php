<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\FizzBuzz\Core;

use PHPUnit\Framework\TestCase;

use LearnModernPhp\Chozetsu\FizzBuzz\Spec;

final class NumberConverterTest extends TestCase
{
    public static function FizzBuzzDataProviders(): array
    {
        return [
            'in 3'   => [3, 'Fizz'],
            'in 5'   => [5, 'Buzz'],
            'in 1'  => [1, '1'],
            'in 15' => [15, 'FizzBuzz'],
        ];
    }

    /**
     * @dataProvider FizzBuzzDataProviders
     */
    public function testFizzBuzz($param, $actual): void
    {
        $fizzBuzz = new NumberConverter(
            [
                new Spec\CyclicNumberRule(3, 'Fizz'),
                new Spec\CyclicNumberRule(5, 'Buzz'),
                new Spec\PassThroughRule(),
            ]
        );
        $this->assertSame($actual, $fizzBuzz->convert($param));
    }
}
