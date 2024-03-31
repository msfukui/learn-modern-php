<?php

declare(strict_types=1);

namespace LearnModernPhp\SevenInRow;

beforeEach(function () {
    $this->card = Card::create(KindOfSuit::SPADES, KindOfRank::ACE);
});

describe('Card', function () {

    describe('Card#suit', function () {

        it('カードのスートを返す', function () {
            expect($this->card->suit())->toBe(KindOfSuit::SPADES);
        });
    });

    describe('Card#rank', function () {

        it('カードのランクを返す', function () {
            expect($this->card->rank())->toBe(KindOfRank::ACE);
        });
    });
});
