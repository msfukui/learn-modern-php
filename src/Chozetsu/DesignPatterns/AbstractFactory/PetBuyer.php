<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DesignPatterns\AbstractFactory;

use InvalidArgumentException;

class PetBuyer
{
    public function buyPet(string $type): void
    {
        $pet = match($type) {
            'cat' => new Cat(),
            'dog' => new Dog(),
            default => throw new InvalidArgumentException(),
        };
        buy($pet);
    }
}
