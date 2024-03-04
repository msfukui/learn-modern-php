<?php

declare(strict_types=1);

namespace LearnModernPhp\DesignForTestability;

use DateTimeImmutable;

describe('Greeter#greet', function () {

    beforeEach(function () {
        $this->greeter = new Greeter();
    });

    it('朝(05:00以上12:00未満)の場合, 「おはようございます」を返す', function () {
        $time = DateTimeImmutable::createFromFormat('H:i:s', '06:00:00');
        expect($this->greeter->greet(now: $time))->toBe('おはようございます');
    });

    it('昼(12:00以上18:00未満)の場合, 「こんにちは」を返す', function () {
        $time = DateTimeImmutable::createFromFormat('H:i:s', '13:00:00');
        expect($this->greeter->greet(now: $time))->toBe('こんにちは');
    });

    it('夜(18:00以上05:00未満)の場合, 「こんばんは」を返す', function () {
        $time = DateTimeImmutable::createFromFormat('H:i:s', '19:00:00');
        expect($this->greeter->greet(now: $time))->toBe('こんばんは');
    });

    it('locale=en で朝(05:00以上12:00未満)の場合, 「Good Morning」を返す', function () {
        $time = DateTimeImmutable::createFromFormat('H:i:s', '06:00:00');
        expect($this->greeter->greet(now: $time, locale: 'en'))->toBe('Good Morning');
    });

    it('locale=en で昼(12:00以上18:00未満)の場合, 「Good Afternoon」を返す', function () {
        $time = DateTimeImmutable::createFromFormat('H:i:s', '13:00:00');
        expect($this->greeter->greet(now: $time, locale: 'en'))->toBe('Good Afternoon');
    });

    it('locale=en で夜(18:00以上05:00未満)の場合, 「Good Evening」を返す', function () {
        $time = DateTimeImmutable::createFromFormat('H:i:s', '19:00:00');
        expect($this->greeter->greet(now: $time, locale: 'en'))->toBe('Good Evening');
    });

    it('locale=en で引数に時間の指定がない場合, 実行した時間に対応する文字列を返す', function () {
        expect($this->greeter->greet(locale: 'en'))->toBeString();
    });
});
