<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\Solid\FizzBuzz\AbstractModel\Spec;

use LearnModernPhp\Chozetsu\Solid\FizzBuzz\AbstractModel\Core;

final readonly class PassThroughRule implements Core\ReplaceRuleInterface
{
    public function match(string $carry, int $n): bool
    {
        return $carry == "";
    }

    public function apply(string $carry, int $n): string
    {
        return (string)$n;
    }
}
