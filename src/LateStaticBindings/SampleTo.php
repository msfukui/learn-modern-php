<?php

declare(strict_types=1);

namespace LearnModernPhp\LateStaticBindings;

class SampleTo extends SampleFrom
{
    public static function parentFoo(): string
    {
        return parent::bar();
    }

    public static function bar(): string
    {
        return 'SampleTo#bar()';
    }
}
