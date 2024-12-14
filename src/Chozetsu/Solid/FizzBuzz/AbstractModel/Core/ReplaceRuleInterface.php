<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\Solid\FizzBuzz\AbstractModel\Core;

interface ReplaceRuleInterface
{
    public function match(string $carry, int $n): bool;
    public function apply(string $carry, int $n): string;
}
