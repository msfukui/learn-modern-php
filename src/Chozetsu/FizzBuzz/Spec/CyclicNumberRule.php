<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\FizzBuzz\Spec;

use LearnModernPhp\Chozetsu\FizzBuzz\Core;

final class CyclicNumberRule implements Core\ReplaceRuleInterface
{
    public function __construct(
        protected int $divisor,
        protected string $replacement
    ) {
    }

    public function match(string $carry, int $n): bool
    {
        return $n % $this->divisor === 0;
    }

    public function apply(string $carry, int $n): string
    {
        return $carry . $this->replacement;
    }
}
