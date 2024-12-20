<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DesignPatterns\Behavior\TemplateMethod;

class PlusExpression extends AbstractExpression
{
    protected function validate(array $vars): bool
    {
        return count($vars) === 2;
    }

    protected function calculate(): int
    {
        return $this->vars[0] + $this->vars[1];
    }
}
