<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DependencyInjection\FizzBuzz;

use Exception;
use LearnModernPhp\Chozetsu\DependencyInjection\FizzBuzz\App\FizzBuzzSequencePrinter;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

final readonly class App
{
    /**
     * @throws Exception
     */
    public static function main(): void
    {
        $containerBuilder = new ContainerBuilder();
        $loader = new YamlFileLoader(
            $containerBuilder,
            new FileLocator(__DIR__ . '/../../../../config'),
        );
        $loader->load('services.yaml');
        $containerBuilder->compile();

        $containerBuilder->get(FizzBuzzSequencePrinter::class)
            ->printRange(1, 100);
    }
}

require_once __DIR__ . '/../../../../vendor/autoload.php';

App::main();
