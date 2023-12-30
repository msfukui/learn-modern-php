<?php

namespace LearnModernPhp\Chozetsu\TDD;

use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;

class MathUtilTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testSaturate(): void
    {
        $mathStub = $this->createStub(Math::class);
        $mathUtil = new MathUtil($mathStub);

        $mathStub->expects($this->atLeastOnce())
            ->method('max')
            ->with($this->equalTo(2), $this->equalTo(1))
            ->willReturn(2);
        $mathStub->expects($this->atLeastOnce())
            ->method('min')
            ->with($this->equalTo(2), $this->equalTo(3))
            ->willReturn(2);

        $this->assertEquals(2, $mathUtil->saturate(2, 1, 3));
    }
}
