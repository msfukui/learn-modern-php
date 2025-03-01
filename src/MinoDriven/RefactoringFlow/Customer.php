<?php

declare(strict_types=1);

namespace LearnModernPhp\MinoDriven\RefactoringFlow;

final readonly class Customer
{
    public function __construct(
        private CustomerId $id,
        private PurchasePoint $possessionPoint,
        private bool $isEnabled,
    ) {
    }

    public function id(): CustomerId
    {
        return $this->id;
    }

    public function possessionPoint(): PurchasePoint
    {
        return $this->possessionPoint;
    }

    public function isEnabled(): bool
    {
        return $this->isEnabled;
    }

    public function isDisabled(): bool
    {
        return ! $this->isEnabled;
    }

    /**
     * @param Comic $comic 購入対象のWebコミック
     * @return bool ポイントが足りないかどうか
     */
    public function isShortOfPoint(Comic $comic): bool
    {
        return $this->possessionPoint->amount() < $comic->currentPurchasePoint()->amount();
    }
}
