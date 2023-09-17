<?php

declare (strict_types=1);

use LearnModernPhp\MyDiContainer\Container;
use Nyholm\Psr7\Factory\Psr17Factory;

require_once __DIR__ . '/../../vendor/autoload.php';

$container = new Container([
    'birthday' => '1990-01-01',
    Psr17Factory::class => new \Nyholm\Psr7\Factory\Psr17Factory(),
]);

assert($container->get('birthday') === '1990-01-01');
assert($container->get(Psr17Factory::class) instanceof Psr17Factory);

echo "Ok.¥n";
