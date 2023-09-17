<?php

declare (strict_types=1);

namespace LearnModernPhp\Testable;

final class Adder
{
    public function add(int $a, int $b): int
    {
        return $a + $b;
    }
}
