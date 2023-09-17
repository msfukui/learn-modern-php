<?php

declare (strict_types=1);

namespace LearnModernPhp\MyDiContainer;

use Nyholm\Psr7\Factory\Psr17Factory;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class ContainerTest extends TestCase
{
    private Container $container;

    public static function ContainerGetOkProvider(): array
    {
        $psr17Factory = new \Nyholm\Psr7\Factory\Psr17Factory();

        return [
            'String OK' => [['birthday' => '1990-01-01'], 'birthday', '1990-01-01'],
            'Psr17Factory OK' => [[Psr17Factory::class => $psr17Factory],
                Psr17Factory::class, $psr17Factory],
        ];
    }

    #[DataProvider('ContainerGetOkProvider')]
    public function testGetOk(array $data, string $id, mixed $expected): void
    {
        $this->container = new Container($data);

        $this->assertSame($expected, $this->container->get($id));
    }

    public function testGetThrowsException(): void
    {
        $this->container = new Container(['birthday' => '1990-01-01']);

        $this->expectException(NotFoundException::class);
        $this->expectExceptionMessage("Entry 'anniversary' not found");

        $this->container->get('anniversary');
    }

    public static function ContainerHasOkProvider(): array
    {
        $psr17Factory = new \Nyholm\Psr7\Factory\Psr17Factory();

        return [
            'String OK' => [['birthday' => '1990-01-01'], 'birthday'],
            'Psr17Factory OK' => [[Psr17Factory::class => $psr17Factory],
                Psr17Factory::class],
        ];
    }

    #[DataProvider('ContainerHasOkProvider')]
    public function testHasOk(array $data, string $id): void
    {
        $this->container = new Container($data);

        $this->assertTrue($this->container->has($id));
    }

    public function testHasNg(): void
    {
        $this->container = new Container(['birthday' => '1990-01-01']);

        $this->assertFalse($this->container->has('anniversary'));
    }
}
