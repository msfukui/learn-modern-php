<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DesignPatterns\Observer;

trait NotifiableTrait
{
    /**
     * @var array<string, callable[]>
     */
    protected array $observersMap = [];

    public function addObserver(string $eventKey, callable $observer): void
    {
        $this->observersMap[$eventKey][] = $observer;
    }

    protected function notify(string $eventKey, mixed $data): void
    {
        $observers = $this->observersMap[$eventKey] ?? [];
        foreach ($observers as $observer) {
            $observer($data);
        }
    }
}
