<?php

declare (strict_types=1);

use LearnModernPhp\MyDiContainer\Container;
use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message as HttpMessage;
use LearnModernPhp\MyDiContainer\Http\JsonResponseFactory;

use function LearnModernPhp\MyDiContainer\get;
use function LearnModernPhp\MyDiContainer\autowire;

require_once __DIR__ . '/../../vendor/autoload.php';

$container = new Container([
    'birthday' => '1990-01-01',
    JsonResponseFactory::class => autowire(JsonResponseFactory::class),
    HttpMessage\RequestFactoryInterface::class => get(Psr17Factory::class),
    HttpMessage\ResponseFactoryInterface::class => get(Psr17Factory::class),
    HttpMessage\StreamFactoryInterface::class => get(Psr17Factory::class),
    Psr17Factory::class => new \Nyholm\Psr7\Factory\Psr17Factory(),
]);

assert($container->get('birthday') === '1990-01-01');
assert($container->get(JsonResponseFactory::class) instanceof JsonResponseFactory);
assert($container->get(HttpMessage\RequestFactoryInterface::class) instanceof Psr17Factory);
assert($container->get(HttpMessage\ResponseFactoryInterface::class) instanceof Psr17Factory);
assert($container->get(HttpMessage\StreamFactoryInterface::class) instanceof Psr17Factory);
assert($container->get(Psr17Factory::class) instanceof Psr17Factory);

echo "Ok.¥n";
