<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\Solid\FizzBuzz\HardCode;

final class HardCode
{
    public static function fizz_buzz(int $number): string
    {
        if ($number % 15 === 0) {
            return 'FizzBuzz';
        } elseif ($number % 3 === 0) {
            return 'Fizz';
        } elseif ($number % 5 === 0) {
            return 'Buzz';
        }
        return (string)$number;
    }
}
