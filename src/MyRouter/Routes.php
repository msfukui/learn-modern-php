<?php

declare (strict_types=1);

namespace LearnModernPhp\MyRouter;

final class Routes
{
    /**
     * @var array<string, array<string, mixed>>
     */
    private static $routes = [];

    public static function draw(callable $f): void
    {
        $f();

        $method = $_SERVER['REQUEST_METHOD'];
        $path = $_SERVER['REQUEST_URI'];

        $func_array = self::search($method, $path);

        if (
            !empty($func_array) &&
            !empty($func_array['function']) &&
            is_callable($func_array['function'])
        ) {
            $r = $func_array['function']();
            if (!empty($r)) {
                http_response_code(200) ;
                echo $r;
                return;
            }
        }

        http_response_code(404) ;
        echo '404 Not Found';
    }

    public static function get(string $path, callable $callback): void
    {
        if (!isset(self::$routes['GET'])) {
            self::$routes['GET'] = [];
        }

        $path_tree = &self::$routes['GET'];

        $paths = explode('/', $path);
        array_shift($paths);

        foreach ($paths as $k => $v) {

            if (empty($path_tree['/' . $v])) {
                $path_tree += [
                    '/' . $v => []
                ];
            }

            $c = &$path_tree['/' . $v];

            if ($k === count($paths) - 1) {
                $c += [
                    'function' => $callback
                ];
            } else {
                $path_tree = &$c;
            }
        }

        return;
    }

    /**
     * @return array<string, mixed>
     */
    private static function search(string $method, string $path): array
    {
        if (empty(self::$routes[$method])) {
            return [];
        }

        $path_tree = self::$routes[$method];

        $paths = explode('/', $path);
        array_shift($paths);

        foreach ($paths as $k => $v) {

            if (empty($path_tree['/' . $v])) {
                return [];
            }

            $c = $path_tree['/' . $v];

            if ($k === count($paths) - 1) {
                $r = [];
                foreach ($c as $kk => $vv) {
                    if (strncmp($kk, '/', 1) !== 0) {
                        $r += [$kk => $vv];
                    }
                }
                return $r;
            } else {
                $path_tree = $c;
            }
        }

        return [];
    }
}

function get(string $path, callable $to): void
{
    Routes::get($path, $to);
}
