<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DependencyInjection\FizzBuzz;

final readonly class App
{
    public static function main(): void
    {
        $factory = new FizzBuzzAppFactory();
        $printer = $factory->create();
        $printer->printRange(1, 100);
    }
}

require_once __DIR__ . '/../../../../vendor/autoload.php';

App::main();
