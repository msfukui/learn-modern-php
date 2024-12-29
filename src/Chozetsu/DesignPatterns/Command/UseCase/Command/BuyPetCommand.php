<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DesignPatterns\Command\UseCase\Command;

use LearnModernPhp\Chozetsu\DesignPatterns\Command\Common\CommandInterface;
use LearnModernPhp\Chozetsu\DesignPatterns\Command\UseCase\Pet;
use LearnModernPhp\Chozetsu\DesignPatterns\Command\UseCase\PetShop;

class BuyPetCommand implements CommandInterface
{
    public function __construct(
        protected PetShop $shop,
        protected Pet $pet,
    ) {
    }

    public function invoke(): void
    {
        // $this->shop と $this->pet を使って購入を処理する
    }
}
