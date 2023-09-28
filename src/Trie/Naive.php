<?php

declare (strict_types=1);

namespace LearnModernPhp\Trie;

final class Naive
{
    public static function run(string $method, string $path, array $tree): array
    {
        if (empty($tree)) {
            return [];
        }

        if (empty($tree[$method])) {
            return [];
        }

        $path_tree = $tree[$method];

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
