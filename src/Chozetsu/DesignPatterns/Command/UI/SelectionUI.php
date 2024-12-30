<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DesignPatterns\Command\UI;

use InvalidArgumentException;
use LearnModernPhp\Chozetsu\DesignPatterns\Command\Common\CommandInterface;

final class SelectionUI
{
    /**
     * @var array<SelectionItem>
     */
    protected array $selectionItems = [];

    public function registerCommand(
        string $label,
        CommandInterface|callable $command,
    ): void {
        $this->selectionItems[] = new SelectionItem($label, $command);
    }

    public function help(): string
    {
        $indexedItemList = [];
        foreach ($this->selectionItems as $i => $item) {
            $indexedItemList[] = sprintf(
                '%d: %s',
                $i + 1,
                $item->label,
            );
        }
        return implode(PHP_EOL, $indexedItemList);
    }

    public function select(int $index): void
    {
        if (count($this->selectionItems) < $index) {
            throw new InvalidArgumentException('Invalid selection');
        }
        $command = $this->selectionItems[$index - 1]->command;
        match (true) {
            is_callable($command) => $command(),
            $command instanceof CommandInterface => $command->invoke(),
        };
    }
}
