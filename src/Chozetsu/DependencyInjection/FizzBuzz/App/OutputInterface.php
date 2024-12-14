<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DependencyInjection\FizzBuzz\App;

interface OutputInterface
{
    public function write(string $data): void;
}
