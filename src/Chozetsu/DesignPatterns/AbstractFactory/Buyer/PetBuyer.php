<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DesignPatterns\AbstractFactory\Buyer;

readonly class PetBuyer
{
    public function buyPet(PetShopInterface $petShop, string $type): void
    {
        $pet = $petShop->createPet($type);
        buy($pet);
    }
}
