<?php

declare(strict_types=1);

namespace LearnModernPhp\CleanCodePhp\Functions;

use PHPUnit\Framework\TestCase;

final class DefaultArgumentsTest extends TestCase
{
    private DefaultArguments $f;

    protected function setUp(): void
    {
        $this->f = new DefaultArguments();
    }

    public function testBadFunction(): void
    {
        $this->expectException(\TypeError::class);
        $this->f->BadcreateMicrobrewery(null);
    }

    public function testNotBadFunction(): void
    {
        $this->assertSame('Hipster Brew Co.', $this->f->NotBadcreateMicrobrewery(null));
    }

    public function testGoodFunction(): void
    {
        $this->expectException(\TypeError::class);
        $this->f->GoodcreateMicrobrewery(null);
    }
}
