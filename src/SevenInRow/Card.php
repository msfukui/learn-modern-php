<?php

declare(strict_types=1);

namespace LearnModernPhp\SevenInRow;

readonly class Card
{
    private function __construct(
        private KindOfSuit $suit,
        private KindOfRank $rank
    ) {
    }

    public function suit(): KindOfSuit
    {
        return $this->suit;
    }

    public function rank(): KindOfRank
    {
        return $this->rank;
    }

    public static function create(KindOfSuit $suit, KindOfRank $rank): self
    {
        return new self($suit, $rank);
    }
}
