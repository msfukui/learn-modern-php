<?php

declare (strict_types=1);

namespace LearnModernPhp\MyDiContainer;

use PHPUnit\Framework\TestCase;

final class ContainerTest extends TestCase
{
    private Container $container;

    protected function setUp(): void
    {
        $this->container = new Container(['birthday' => '1990-01-01']);
    }

    public function testGet()
    {
        $this->assertSame('1990-01-01', $this->container->get('birthday'));
    }

    public function testGetThrowsException()
    {
        $this->expectException(NotFoundException::class);
        $this->expectExceptionMessage("Entry 'anniversary' not found");

        $this->container->get('anniversary');
    }

    public function testHas()
    {
        $this->assertTrue($this->container->has('birthday'));
        $this->assertFalse($this->container->has('anniversary'));
    }
}
