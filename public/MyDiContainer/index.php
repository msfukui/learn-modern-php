<?php

declare (strict_types=1);

use LearnModernPhp\MyDiContainer\Container;

require_once __DIR__ . '/../../vendor/autoload.php';

$container = new Container([
    'birthday' => '1990-01-01'
]);

assert($container->get('birthday') === '1990-01-01');

echo "Ok.¥n";
