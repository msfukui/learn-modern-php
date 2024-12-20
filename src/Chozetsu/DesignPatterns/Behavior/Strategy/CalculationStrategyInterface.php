<?php

namespace LearnModernPhp\Chozetsu\DesignPatterns\Behavior\Strategy;

interface CalculationStrategyInterface
{
    /**
     * @param array<int> $vars
     */
    public function validate(array $vars): bool;

    /**
     * @param array<int> $vars
     */
    public function calculate(array $vars): int;
}
