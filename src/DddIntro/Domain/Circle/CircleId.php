<?php

declare(strict_types=1);

namespace LearnModernPhp\DddIntro\Domain\Circle;

final readonly class CircleId
{
    public function __construct(
        private string $id
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }
}
