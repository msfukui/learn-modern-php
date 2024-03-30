<?php

declare(strict_types=1);

namespace LearnModernPhp\DddIntro\Domain\Circle;

final readonly class Circle
{
    public function __construct(
        private CircleId $id,
        private CircleName $name
    ) {
    }

    public function getId(): CircleId
    {
        return $this->id;
    }

    public function getName(): CircleName
    {
        return $this->name;
    }
}
