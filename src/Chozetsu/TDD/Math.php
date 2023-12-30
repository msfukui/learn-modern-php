<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\TDD;

final class Math
{
    public function __construct()
    {
    }

    public function min(int $a, $b): int
    {
        return $a < $b ? $a : $b;
    }

    public function max(int $a, $b): int
    {
        return $a > $b ? $a : $b;
    }
}
