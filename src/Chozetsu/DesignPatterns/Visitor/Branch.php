<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DesignPatterns\Visitor;

class Branch extends Node
{
    /**
     * @var Node[]
     */
    protected array $children;

    public function accept(callable $visitor): void
    {
        parent::accept($visitor);
        foreach ($this->children as $child) {
            $child->accept($visitor);
        }
    }
}
