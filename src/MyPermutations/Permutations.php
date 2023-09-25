<?php

declare (strict_types=1);

namespace LearnModernPhp\MyPermutations;

final class Permutations
{
    public static function run(array $elements): array
    {
        if (count($elements) <= 1) {
            return [$elements];
        }

        $permutations = [];

        foreach ($elements as $key => $element) {
            $remainingElements = $elements;

            unset($remainingElements[$key]);

            foreach (self::run($remainingElements) as $permutation) {
                array_unshift($permutation, $element);

                $permutations[] = $permutation;
            }
        }

        return $permutations;
    }
}
