<?php

declare(strict_types=1);

namespace LearnModernPhp\Timer;

final class Stopwatch
{
    private $start;
    private $end;

    public function start($now)
    {
        $this->start = $now;
    }

    public function stop($now)
    {
        $this->end = $now;
    }

    public function elapsed()
    {
        return $this->end - $this->start;
    }
}
