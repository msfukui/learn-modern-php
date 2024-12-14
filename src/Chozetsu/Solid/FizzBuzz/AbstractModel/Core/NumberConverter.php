<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\Solid\FizzBuzz\AbstractModel\Core;

class NumberConverter
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
