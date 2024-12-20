<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DesignPatterns\Behavior\Strategy;

use InvalidArgumentException;
use LearnModernPhp\Chozetsu\DesignPatterns\Behavior\ExpressionInterface;
use LogicException;

class Expression implements ExpressionInterface
{
    /**
     * @var ?array<int>
     */
    protected ?array $vars = null;

    public function __construct(
        protected CalculationStrategyInterface $calculationStrategy,
    ) {
    }

    public function setVariables(array $vars): void
    {
        if (! $this->calculationStrategy->validate($vars)) {
            throw new InvalidArgumentException();
        }
        $this->vars = $vars;
    }

    public function evaluate(): int
    {
        if ($this->vars === null) {
            throw new LogicException();
        }
        return $this->calculationStrategy->calculate($this->vars);
    }
}
