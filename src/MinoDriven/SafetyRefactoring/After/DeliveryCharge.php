<?php

declare(strict_types=1);

namespace LearnModernPhp\MinoDriven\SafetyRefactoring\After;

final readonly class DeliveryCharge
{
    private const CHARGE_FREE_THRESHOLD = 2000;
    private const PAY_CHARGE = 500;
    private const CHARGE_FREE = 0;

    private int $amount;

    public function __construct(
        ShoppingCart $shoppingCart,
    ) {
        if ($shoppingCart->totalPrice() < self::CHARGE_FREE_THRESHOLD) {
            $this->amount = self::PAY_CHARGE;
        } else {
            $this->amount = self::CHARGE_FREE;
        }
    }

    public function amount(): int
    {
        return $this->amount;
    }
}
