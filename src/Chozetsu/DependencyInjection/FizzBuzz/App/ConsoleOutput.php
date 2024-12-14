<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DependencyInjection\FizzBuzz\App;

final readonly class ConsoleOutput implements OutputInterface
{
    public function write(string $data): void
    {
        echo $data;
    }
}
