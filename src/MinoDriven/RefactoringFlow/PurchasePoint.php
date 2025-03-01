<?php

declare(strict_types=1);

namespace LearnModernPhp\MinoDriven\RefactoringFlow;

final readonly class PurchasePoint
{
    public function __construct(
        private int $amount
    ) {
    }

    public function amount(): int
    {
        return $this->amount;
    }
}
