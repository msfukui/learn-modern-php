<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DependencyInjection\FizzBuzz;

use LearnModernPhp\Chozetsu\DependencyInjection\FizzBuzz\App\ConsoleOutput;
use LearnModernPhp\Chozetsu\DependencyInjection\FizzBuzz\App\FizzBuzzSequencePrinter;
use LearnModernPhp\Chozetsu\Solid\FizzBuzz\AbstractModel\Core\NumberConverter;
use LearnModernPhp\Chozetsu\Solid\FizzBuzz\AbstractModel\Core\ReplaceRuleInterface;
use LearnModernPhp\Chozetsu\Solid\FizzBuzz\AbstractModel\Spec\CyclicNumberRule;
use LearnModernPhp\Chozetsu\Solid\FizzBuzz\AbstractModel\Spec\PassThroughRule;

final readonly class FizzBuzzAppFactory
{
    public function create(): FizzBuzzSequencePrinter
    {
        return new FizzBuzzSequencePrinter(
            new NumberConverter(
                [
                    $this->createFizzRule(),
                    $this->createBuzzRule(),
                    $this->createPassThroughRule(),
                ]
            ),
            new ConsoleOutput(),
        );
    }

    private function createFizzRule(): ReplaceRuleInterface
    {
        return new CyclicNumberRule(3, 'Fizz');
    }

    private function createBuzzRule(): ReplaceRuleInterface
    {
        return new CyclicNumberRule(5, 'Buzz');
    }

    private function createPassThroughRule(): ReplaceRuleInterface
    {
        return new PassThroughRule();
    }
}
