<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DependencyInjection\FizzBuzz\App;

use LearnModernPhp\Chozetsu\Solid\FizzBuzz\AbstractModel\Core\NumberConverter;
use LearnModernPhp\Chozetsu\Solid\FizzBuzz\AbstractModel\Spec\CyclicNumberRule;
use LearnModernPhp\Chozetsu\Solid\FizzBuzz\AbstractModel\Spec\PassThroughRule;

final readonly class FizzBuzzSequencePrinter
{
    public function printRange(int $begin, int $end): void
    {
        $fizzBuzz = new NumberConverter([
            new CyclicNumberRule(3, 'Fizz'),
            new CyclicNumberRule(5, 'Buzz'),
            new PassThroughRule(),
        ]);
        for ($i = $begin; $i <= $end; $i++) {
            printf("%d %s\n", $i, $fizzBuzz->convert($i));
        }
    }
}
