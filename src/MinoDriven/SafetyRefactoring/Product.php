<?php

declare(strict_types=1);

namespace LearnModernPhp\MinoDriven\SafetyRefactoring;

final readonly class Product
{
    public function __construct(
        private int $id,
        private string $name,
        private int $price,
    ) {
    }

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function price(): int
    {
        return $this->price;
    }
}
