<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DesignPatterns\Observer;

interface ObserverInterface
{
    public function addObserver(string $eventKey, callable $observer): void;
}
