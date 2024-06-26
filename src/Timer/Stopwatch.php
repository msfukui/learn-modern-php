<?php

declare(strict_types=1);

namespace LearnModernPhp\Timer;

final class Stopwatch
{
    private int $start;
    private int $end;

    public function start(int $now): void
    {
        $this->start = $now;
    }

    public function stop(int $now): void
    {
        $this->end = $now;
    }

    public function elapsed(): int
    {
        return $this->end - $this->start;
    }
}
