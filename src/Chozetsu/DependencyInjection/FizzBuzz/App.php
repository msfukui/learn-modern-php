<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DependencyInjection\FizzBuzz;

use LearnModernPhp\Chozetsu\DependencyInjection\FizzBuzz\App\FizzBuzzSequencePrinter;

final readonly class App
{
    public static function main(): void
    {
        $printer = new FizzBuzzSequencePrinter();
        $printer->printRange(1, 100);
    }
}

require_once __DIR__ . '/../../../../vendor/autoload.php';

App::main();
