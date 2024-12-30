<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DesignPatterns\Visitor;

interface VisitorInterface
{
    public function accept(callable $visitor): void;
}
