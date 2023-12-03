<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\FizzBuzz;

final class HardCode
{
    public static function fizz_buzz(int $number): string
    {
        if ($number === 3) {
            return 'Fizz';
        }
        return 'Buzz';
    }
}
