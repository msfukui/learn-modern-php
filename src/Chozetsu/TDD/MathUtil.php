<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\TDD;

class MathUtil
{
    public function __construct(protected readonly Math $math)
    {
    }

    public function saturate(int $value, int $min, int $max): int
    {
        return $this->math->min($this->math->max($value, $min), $max);
    }
}
