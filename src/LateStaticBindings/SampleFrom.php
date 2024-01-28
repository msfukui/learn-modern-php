<?php

declare(strict_types=1);

namespace LearnModernPhp\LateStaticBindings;

class SampleFrom
{
    public static function selfFoo(): string
    {
        return self::bar();
    }

    public static function staticFoo(): string
    {
        return static::bar();
    }

    public static function bar(): string
    {
        return 'SampleFrom#bar()';
    }
}
