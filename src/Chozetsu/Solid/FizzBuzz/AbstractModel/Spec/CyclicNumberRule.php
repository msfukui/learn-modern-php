<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\Solid\FizzBuzz\AbstractModel\Spec;

use LearnModernPhp\Chozetsu\Solid\FizzBuzz\AbstractModel\Core;

final readonly class CyclicNumberRule implements Core\ReplaceRuleInterface
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
