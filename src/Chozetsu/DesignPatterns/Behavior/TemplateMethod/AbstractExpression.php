<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DesignPatterns\Behavior\TemplateMethod;

use InvalidArgumentException;
use LearnModernPhp\Chozetsu\DesignPatterns\Behavior\ExpressionInterface;
use LogicException;

abstract class AbstractExpression implements ExpressionInterface
{
    /**
     * @var ?array<int>
     */
    protected ?array $vars = null;

    public function setVariables(array $vars): void
    {
        if (! $this->validate($vars)) {
            throw new InvalidArgumentException();
        }
        $this->vars = $vars;
    }

    /**
     * @param array<int> $vars
     */
    abstract protected function validate(array $vars): bool;

    public function evaluate(): int
    {
        if ($this->vars === null) {
            throw new LogicException();
        }
        return $this->calculate();
    }

    abstract protected function calculate(): int;
}
