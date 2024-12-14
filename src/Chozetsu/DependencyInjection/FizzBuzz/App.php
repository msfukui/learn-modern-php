<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DependencyInjection\FizzBuzz;

use LearnModernPhp\Chozetsu\DependencyInjection\FizzBuzz\App\FizzBuzzSequencePrinter;
use LearnModernPhp\Chozetsu\DependencyInjection\FizzBuzz\App\OutputInterface;
use LearnModernPhp\Chozetsu\Solid\FizzBuzz\AbstractModel\Core\NumberConverter;
use LearnModernPhp\Chozetsu\Solid\FizzBuzz\AbstractModel\Spec\CyclicNumberRule;
use LearnModernPhp\Chozetsu\Solid\FizzBuzz\AbstractModel\Spec\PassThroughRule;

final readonly class App
{
    public static function main(): void
    {
        $printer = new FizzBuzzSequencePrinter(
            new NumberConverter([
                new CyclicNumberRule(3, 'Fizz'),
                new CyclicNumberRule(5, 'Buzz'),
                new PassThroughRule(),
            ]),
            new class () implements OutputInterface {
                public function write(string $data): void
                {
                    echo $data;
                }
            }
        );
        $printer->printRange(1, 100);
    }
}

require_once __DIR__ . '/../../../../vendor/autoload.php';

App::main();
