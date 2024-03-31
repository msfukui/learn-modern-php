<?php

declare(strict_types=1);

namespace LearnModernPhp\SevenInRow;

beforeEach(function () {
    $this->player = new Player(
        [
            Card::create(KindOfSuit::SPADES, KindOfRank::ACE),
            Card::create(KindOfSuit::HEARTS, KindOfRank::KING),
        ]
    );
});

describe('Player', function () {

    describe('Player#putDown', function () {

        it('持っているカードを指定して一枚取り出せる', function () {
            $this->player->putDown(Card::create(KindOfSuit::SPADES, KindOfRank::ACE));
        })->throwsNoExceptions();

        it('持っていないカードを指定すると例外が発生する', function () {
            $this->player->putDown(Card::create(KindOfSuit::SPADES, KindOfRank::TWO));
        })->throws(NotFoundException::class);
    });

    describe('Player#isEmpty', function () {

        it('持っているカードがない場合に true を返す', function () {
            $this->player->putDown(Card::create(KindOfSuit::SPADES, KindOfRank::ACE));
            $this->player->putDown(Card::create(KindOfSuit::HEARTS, KindOfRank::KING));
            expect($this->player->isEmpty())->toBeTrue();
        });
    });

    describe('Player#isNotEmpty', function () {

        it('持っているカードがある場合に true を返す', function () {
            expect($this->player->isNotEmpty())->toBeTrue();
        });
    });
});
