<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DesignPatterns\AbstractFactory;

use LearnModernPhp\Chozetsu\DesignPatterns\AbstractFactory\Shop\PetShop;

readonly class PetBuyer
{
    public function buyPet(PetShop $petShop, string $type): void
    {
        $pet = $petShop->createPet($type);
        buy($pet);
    }
}
