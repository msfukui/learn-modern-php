<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\FizzBuzz\Spec;

use LearnModernPhp\Chozetsu\FizzBuzz\Core;

final class PassThroughRule implements Core\ReplaceRuleInterface
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
