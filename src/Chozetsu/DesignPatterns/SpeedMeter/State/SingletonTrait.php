<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DesignPatterns\SpeedMeter\State;

trait SingletonTrait
{
    private static ?self $instance = null;

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
