<?php

declare(strict_types=1);

namespace LearnModernPhp\MinoDriven\RefactoringFlow;

final readonly class CustomerId
{
    public function __construct(
        private int $id
    ) {
    }

    public function id(): int
    {
        return $this->id;
    }
}
