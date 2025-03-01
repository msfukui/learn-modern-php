<?php

declare(strict_types=1);

namespace LearnModernPhp\MinoDriven\RefactoringFlow;

final readonly class Comic
{
    public function __construct(
        private ComicId $id,
        private PurchasePoint $currentPurchasePoint,
        private bool $isEnabled,
    ) {
    }

    public function id(): ComicId
    {
        return $this->id;
    }

    public function currentPurchasePoint(): PurchasePoint
    {
        return $this->currentPurchasePoint;
    }

    public function isEnabled(): bool
    {
        return $this->isEnabled;
    }

    public function isDisabled(): bool
    {
        return ! $this->isEnabled;
    }
}
