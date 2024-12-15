<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DesignPatterns\AbstractFactory\Buyer;

interface PetShopInterface
{
    public function createPet(string $type): Pet;
}
