<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\TDD;

class Math
{
    public function __construct()
    {
    }

    public function min(int $a, int $b): int
    {
        return $a < $b ? $a : $b;
    }

    public function max(int $a, int $b): int
    {
        return $a > $b ? $a : $b;
    }
}
