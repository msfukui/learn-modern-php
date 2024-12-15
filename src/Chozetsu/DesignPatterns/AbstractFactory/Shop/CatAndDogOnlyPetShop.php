<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DesignPatterns\AbstractFactory\Shop;

use InvalidArgumentException;
use LearnModernPhp\Chozetsu\DesignPatterns\AbstractFactory\Buyer\PetShopInterface;
use LearnModernPhp\Chozetsu\DesignPatterns\AbstractFactory\Buyer\Pet;

readonly class CatAndDogOnlyPetShop implements PetShopInterface
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
