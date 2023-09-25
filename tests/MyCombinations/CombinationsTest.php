<?php

declare (strict_types=1);

namespace LearnModernPhp\MyCombinations;

use PHPUnit\Framework\TestCase;

final class CombinationsTest extends TestCase
{
    public function testCombinationsOne(): void
    {
        $this->assertEquals(
            [
                [1],
                [2],
                [3],
                [4],
            ],
            Combinations::run([1, 2, 3, 4], 1)
        );
    }

    public function testCombinationsTwo(): void
    {
        $this->assertEquals(
            [
                [1, 2],
                [1, 3],
                [1, 4],
                [2, 3],
                [2, 4],
                [3, 4]
            ],
            Combinations::run([1, 2, 3, 4], 2)
        );
    }

    public function testCombinationsThree(): void
    {
        $this->assertEquals(
            [
                [1, 2, 3],
                [1, 2, 4],
                [1, 3, 4],
                [2, 3, 4],
            ],
            Combinations::run([1, 2, 3, 4], 3)
        );
    }

    public function testCombinationsFour(): void
    {
        $this->assertEquals(
            [
                [1, 2, 3, 4],
            ],
            Combinations::run([1, 2, 3, 4], 4)
        );
    }

    public function testCombinationsFive(): void
    {
        $this->assertEquals(
            [],
            Combinations::run([1, 2, 3, 4], 5)
        );
    }

    public function testCombinationsZero(): void
    {
        $this->assertEquals(
            [
                [1],
                [2],
                [3],
                [4],
            ],
            Combinations::run([1, 2, 3, 4], 0)
        );
    }
}
