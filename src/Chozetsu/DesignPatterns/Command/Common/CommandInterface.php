<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DesignPatterns\Command\Common;

interface CommandInterface
{
    public function invoke(): void;
}
