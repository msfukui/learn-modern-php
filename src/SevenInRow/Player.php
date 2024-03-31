<?php

declare(strict_types=1);

namespace LearnModernPhp\SevenInRow;

final class Player
{
    /**
     * @param array<Card> $cards
     */
    public function __construct(
        private array $cards
    ) {
    }

    /**
     * @param Card $card
     * @throws NotFoundException
     */
    public function putDown(Card $card): void
    {
        foreach ($this->cards as $i => $c) {
            if ($c == $card) {
                unset($this->cards[$i]);
                $this->cards = array_values($this->cards);
                return;
            }
        }
        throw new NotFoundException('指定されたカードは持っていません');
    }

    public function isEmpty(): bool
    {
        return count($this->cards) === 0;
    }

    public function isNotEmpty(): bool
    {
        return ! $this->isEmpty();
    }
}
