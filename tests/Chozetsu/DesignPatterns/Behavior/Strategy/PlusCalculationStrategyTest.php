<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DesignPatterns\Behavior\Strategy;

use InvalidArgumentException;
use LogicException;

describe('PlusCalculationStrategy', function () {

    it('配列で指定した二つの数を足した数を返す', function () {
        $expression = new Expression(new PlusCalculationStrategy());
        $expression->setVariables([1, 2]);
        expect($expression->evaluate())->toBe(3);
    });

    it('配列に一つしか数がないと引数エラーを返す', function () {
        $expression = new Expression(new PlusCalculationStrategy());
        expect(function () use ($expression) {
            $expression->setVariables([1]);
        })->toThrow(new InvalidArgumentException());
    });

    it('配列に三つの数を指定すると引数エラーを返す', function () {
        $expression = new Expression(new PlusCalculationStrategy());
        expect(function () use ($expression) {
            $expression->setVariables([1, 2, 3]);
        })->toThrow(new InvalidArgumentException());
    });

    it('値がセットされていないとロジックエラーを返す', function () {
        $expression = new Expression(new PlusCalculationStrategy());
        expect(function () use ($expression) {
            $expression->evaluate();
        })->toThrow(new LogicException());
    });
});
