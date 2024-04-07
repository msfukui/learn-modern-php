<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\Solid\FizzBuzz\AbstractModel\Core;

interface ReplaceRuleInterface
{
    public function match(string $carry, int $n): bool;
    public function apply(string $carry, int $n): string;
}

final class NumberConverter
{
    /**
     * @param array<ReplaceRuleInterface> $rules
     */
    public function __construct(
        protected array $rules
    ) {
    }

    public function convert(int $n): string
    {
        $carry = '';
        foreach ($this->rules as $rule) {
            if ($rule->match($carry, $n)) {
                $carry = $rule->apply($carry, $n);
            }
        }

        return $carry;
    }
}
