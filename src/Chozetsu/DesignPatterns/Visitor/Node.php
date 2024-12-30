<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DesignPatterns\Visitor;

class Node implements VisitorInterface
{
    public function accept(callable $visitor): void
    {
        $visitor($this);
    }
}
