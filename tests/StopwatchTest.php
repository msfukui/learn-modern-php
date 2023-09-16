<?php

declare(strict_types=1);

namespace MyTimer;

use PHPUnit\Framework\TestCase;

class StopwatchTest extends TestCase
{
    public function testElapsed()
    {
        $stopwatch = new Stopwatch();
        $stopwatch->start("1");
        $stopwatch->stop("2");
        $this->assertEquals(1, $stopwatch->elapsed());
    }
}
