<?php

declare (strict_types=1);

namespace LearnModernPhp\MyCombinations;

final class Combinations
{
    /**
     * @param array<int> $elements
     * @param int $length
     * @return array<array<int>>
     */
    public static function run(array $elements, int $length): array
    {
        if ($length <= 1) {
            return array_map(function ($element) {
                return [$element];
            }, $elements);
        }

        $combinations = [];

        foreach ($elements as $key => $element) {

            foreach (self::run(array_slice($elements, $key + 1), $length - 1) as $combination) {
                array_unshift($combination, $element);

                $combinations[] = $combination;
            }
        }

        return $combinations;
    }
}
