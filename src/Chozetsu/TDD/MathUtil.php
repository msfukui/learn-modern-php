<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\TDD;

final class MathUtil
{
    public function __construct()
    {
    }

    public function saturate(int $value, int $min, int $max): int
    {
        $math = new Math();
        return $math->min($math->max($value, $min), $max);
    }
}
