<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DesignPatterns\SpeedMeter\State;

abstract class SpeedMeterState
{
    abstract public function nextState(float $speed): SpeedMeterState;
    abstract public function getColor(): string;
}
