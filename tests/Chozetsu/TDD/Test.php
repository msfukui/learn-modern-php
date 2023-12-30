<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\TDD;

use PHPUnit\Framework\TestCase;

class MathTest extends TestCase
{
    public function testMinMax(): void
    {
        $math = new Math();
        $this->assertSame(1, $math->min(1, 2));
        $this->assertSame(2, $math->max(1, 2));
    }
}
