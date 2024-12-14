<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DependencyInjection\FizzBuzz\App;

use LearnModernPhp\Chozetsu\Solid\FizzBuzz\AbstractModel\Core\NumberConverter;

final readonly class FizzBuzzSequencePrinter
{
    public function __construct(
        protected NumberConverter $fizzBuzz,
        protected OutputInterface $output,
    ) {
    }

    public function printRange(int $begin, int $end): void
    {
        for ($i = $begin; $i <= $end; $i++) {
            $text = $this->fizzBuzz->convert($i);
            $formattedText = sprintf("%d %s" . PHP_EOL, $i, $text);
            $this->output->write($formattedText);
        }
    }
}
