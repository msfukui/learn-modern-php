<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DesignPatterns\Behavior;

interface ExpressionInterface
{
    /**
     * @param array<int> $vars
     */
    public function setVariables(array $vars): void;
    public function evaluate(): int;
}
