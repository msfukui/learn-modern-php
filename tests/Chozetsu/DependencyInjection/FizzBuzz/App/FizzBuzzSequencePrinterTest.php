<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DependencyInjection\FizzBuzz\App;

use LearnModernPhp\Chozetsu\Solid\FizzBuzz\AbstractModel\Core\NumberConverter;

describe('FizzBuzzSequencePrinter', function () {

    describe('printRange', function () {

        it('print none', function () {
            $converter = $this->createMock(NumberConverter::class);
            $converter->expects($this->never())->method('convert');

            $output = $this->createMock(OutputInterface::class);
            $output->expects($this->never())->method('write');

            $printer = new FizzBuzzSequencePrinter($converter, $output);
            $printer->printRange(0, -1);
        });

        it('print 1 to 3', function () {
            $converter = $this->createMock(NumberConverter::class);
            $converter->expects($this->exactly(3))
                ->method('convert')
                ->willReturnMap([[1, '1'], [2, '2'], [3, 'Fizz']]);

            $output = $this->createMock(OutputInterface::class);
            $calls = $this->exactly(3);
            $output->expects($calls)
                ->method('write')
                ->willReturnCallback(function (string $data) use ($calls) {
                    return match ($calls->numberOfInvocations()) {
                        1 => expect($data)->toBe('1 1' . PHP_EOL),
                        2 => expect($data)->toBe('2 2' . PHP_EOL),
                        3 => expect($data)->toBe('3 Fizz' . PHP_EOL),
                    };
                });

            $printer = new FizzBuzzSequencePrinter($converter, $output);
            $printer->printRange(1, 3);
        });
    });
});
