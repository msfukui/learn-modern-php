<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DesignPatterns\Observer;

use Psr\Log\LoggerInterface;

final class LoggingObserver
{
    public function __construct(
        protected LoggerInterface $logger
    ) {
    }

    public function watch(ObserverInterface $target, string $eventKey): void
    {
        $target->addObserver($eventKey, function (mixed $data) use ($eventKey) {
            $this->logger->info(sprintf('Event %s was triggered with data: %s', $eventKey, json_encode($data)));
        });
    }
}
