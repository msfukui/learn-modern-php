<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DesignPatterns\Behavior\Strategy;

class PlusCalculationStrategy implements CalculationStrategyInterface
{
    public function validate(array $vars): bool
    {
        return count($vars) === 2;
    }

    public function calculate(array $vars): int
    {
        return $vars[0] + $vars[1];
    }
}
