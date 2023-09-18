<?php

declare (strict_types=1);

namespace LearnModernPhp\MyDiContainer;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message as HttpMessage;

use function LearnModernPhp\MyDiContainer\get;

final class ContainerTest extends TestCase
{
    private Container $container;

    protected function setUp(): void
    {
        $this->container = new Container([
            'birthday' => '1990-01-01',
            HttpMessage\RequestFactoryInterface::class => get(Psr17Factory::class),
            Psr17Factory::class => new \Nyholm\Psr7\Factory\Psr17Factory(),
        ]);
    }

    public static function ContainerGetOkForPsr17FactoryProvider(): array
    {
        return [
            'RequestFactoryInterface OK' =>
                [HttpMessage\RequestFactoryInterface::class, Psr17Factory::class],
            'Psr17Factory OK' =>
                [Psr17Factory::class, Psr17Factory::class ]
        ];
    }

    #[DataProvider('ContainerGetOkForPsr17FactoryProvider')]
    public function testGetOkForPsr17Factory(string $id, mixed $expected): void
    {
        $this->assertInstanceOf($expected, $this->container->get($id));
    }

    public function testGetOkForString(): void
    {
        $this->assertSame('1990-01-01', $this->container->get('birthday'));
    }

    public function testGetThrowsException(): void
    {
        $this->expectException(NotFoundException::class);
        $this->expectExceptionMessage("Entry 'anniversary' not found");

        $this->container->get('anniversary');
    }

    public static function ContainerHasOkForPsr17FactoryProvider(): array
    {
        return [
            'RequestFactoryInterface OK' => [HttpMessage\RequestFactoryInterface::class],
            'Psr17Factory OK' => [Psr17Factory::class],
        ];
    }

    #[DataProvider('ContainerHasOkForPsr17FactoryProvider')]
    public function testHasOkForPsr17Factory(string $id): void
    {
        $this->assertTrue($this->container->has($id));
    }

    public function testHasOkForString(): void
    {
        $this->assertTrue($this->container->has('birthday'));
    }

    public function testHasNgForString(): void
    {
        $this->assertFalse($this->container->has('anniversary'));
    }
}
