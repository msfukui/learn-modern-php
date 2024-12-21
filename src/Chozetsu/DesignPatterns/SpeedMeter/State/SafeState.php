<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DesignPatterns\SpeedMeter\State;

final class SafeState extends SpeedMeterState
{
    use SingletonTrait;

    public function nextState(float $speed): SpeedMeterState
    {
        return $speed > 100.0 ? DangerState::getInstance() : $this;
    }

    public function getColor(): string
    {
        return 'green';
    }
}
