<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DesignPatterns\SpeedMeter\State;

final class SpeedMeter
{
    protected float $speed;
    protected SpeedMeterState $currentState;

    public function __construct()
    {
        $this->speed = 0.0;
        $this->currentState = SafeState::getInstance();
    }

    public function setSpeed(float $speed): void
    {
        $this->speed = $speed;
        $this->currentState = $this->currentState->nextState($speed);
    }

    public function display(): string
    {
        $color = $this->currentState->getColor();
        return sprintf('%.2f km/h %s', $this->speed, $color);
    }
}
