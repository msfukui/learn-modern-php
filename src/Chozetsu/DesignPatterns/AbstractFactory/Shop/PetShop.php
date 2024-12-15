<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DesignPatterns\AbstractFactory\Shop;

use InvalidArgumentException;
use LearnModernPhp\Chozetsu\DesignPatterns\AbstractFactory\Cat;
use LearnModernPhp\Chozetsu\DesignPatterns\AbstractFactory\Dog;
use LearnModernPhp\Chozetsu\DesignPatterns\AbstractFactory\Pet;

readonly class PetShop
{
    public function createPet(string $type): Pet
    {
        return match($type) {
            'cat' => new Cat(),
            'dog' => new Dog(),
            default => throw new InvalidArgumentException(),
        };
    }
}
