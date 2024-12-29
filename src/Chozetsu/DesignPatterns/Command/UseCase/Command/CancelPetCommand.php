<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DesignPatterns\Command\UseCase\Command;

use LearnModernPhp\Chozetsu\DesignPatterns\Command\Common\CommandInterface;
use LearnModernPhp\Chozetsu\DesignPatterns\Command\UseCase\PetShop;

class CancelPetCommand implements CommandInterface
{
    public function __construct(
        protected PetShop $shop,
    ) {
    }

    public function invoke(): void
    {
        // $this->shop に対してキャンセルを申し出る
    }
}
