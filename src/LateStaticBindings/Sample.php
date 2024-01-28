<?php

declare(strict_types=1);

namespace LearnModernPhp\LateStaticBindings;

require_once __DIR__ . '/../../vendor/autoload.php';

echo 'self:' . PHP_EOL;
echo SampleTo::selfFoo() . PHP_EOL;
echo SampleFrom::selfFoo() . PHP_EOL;

echo 'parent:' . PHP_EOL;
echo SampleTo::parentFoo() . PHP_EOL;

echo 'static:' . PHP_EOL;
echo SampleTo::staticFoo() . PHP_EOL;
echo SampleFrom::staticFoo() . PHP_EOL;
