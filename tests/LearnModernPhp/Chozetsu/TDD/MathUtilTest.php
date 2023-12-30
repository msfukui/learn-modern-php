<?php

namespace LearnModernPhp\Chozetsu\TDD;

use PHPUnit\Framework\TestCase;

class MathUtilTest extends TestCase
{
    public function testSaturate(): void
    {
        $math = new MathUtil();
        $this->assertEquals(2, $math->saturate(2, 1, 3));

        $this->assertEquals(1, $math->saturate(0, 1, 3));
        $this->assertEquals(3, $math->saturate(4, 1, 3));

        $this->assertEquals(1, $math->saturate(1, 1, 3));
        $this->assertEquals(3, $math->saturate(3, 1, 3));
    }
}
