<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DesignPatterns\Command\UI;

use LearnModernPhp\Chozetsu\DesignPatterns\Command\Common\CommandInterface;

final readonly class SelectionItem
{
    /**
     * @param string $label
     * @param CommandInterface|callable $command
     */
    public function __construct(
        public string $label,
        public mixed $command,
    ) {
    }
}
