<?php

declare(strict_types=1);

namespace LearnModernPhp\Timer;

use PHPUnit\Framework\TestCase;

final class StopwatchTest extends TestCase
{
    public function testElapsed(): void
    {
        $stopwatch = new Stopwatch();
        $stopwatch->start(1);
        $stopwatch->stop(2);
        $this->assertSame(1, $stopwatch->elapsed());
    }
}
