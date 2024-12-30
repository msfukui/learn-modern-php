<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DesignPatterns\Observer;

final class DataStore implements ObserverInterface
{
    use NotifiableTrait;

    public const EVENT_SAVE = 'save';
    public const EVENT_LOAD = 'load';

    public function save(mixed $data): void
    {
        $this->notify(self::EVENT_SAVE, $data);
    }

    public function load(mixed $data): void
    {
        $this->notify(self::EVENT_LOAD, $data);
    }
}
