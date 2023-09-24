<?php

declare (strict_types=1);

use LearnModernPhp\MyRouter\Routes;

use function LearnModernPhp\MyRouter\get;

require_once __DIR__ . '/../../vendor/autoload.php';

Routes::draw(function () {

    get('/', to: function () {
        return 'Hi, Router';
    });

    get('/hello', to: function () {
        return 'Hello, world';
    });
});
