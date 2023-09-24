<?php

declare (strict_types=1);

namespace LearnModernPhp\MyRouter;

final class Routes
{
    private static $routes = [];

    public static function draw(callable $f): void
    {
        $f();

        $method = $_SERVER['REQUEST_METHOD'];
        $path = $_SERVER['REQUEST_URI'];

        foreach (self::$routes as $route) {
            if ($route['method'] === $method && $route['path'] === $path) {
                $r = $route['callback']();
                if (!empty($r)) {
                    http_response_code(200) ;
                    echo $r;
                }
                return;
            }
        }

        http_response_code(404) ;
        echo '404 Not Found';
    }

    public static function get(string $path, callable $callback): void
    {
        self::$routes[] = [
            'method' => 'GET',
            'path' => $path,
            'callback' => $callback
        ];
    }
}

function get(string $path, callable $to): void
{
    Routes::get($path, $to);
}
