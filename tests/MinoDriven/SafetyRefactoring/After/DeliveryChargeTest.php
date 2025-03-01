<?php

declare(strict_types=1);

namespace LearnModernPhp\MinoDriven\SafetyRefactoring\After;

use LearnModernPhp\MinoDriven\SafetyRefactoring\Product;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

final class DeliveryChargeTest extends TestCase
{
    #[TestDox('商品の合計金額が2000円未満の場合、配送料は500円')]
    public function testPayCharge(): void
    {
        $emptyCart = new ShoppingCart();
        $oneProductAdded = $emptyCart->add(new Product(1, '商品A', 500));
        $twoProductAdded = $oneProductAdded->add(new Product(2, '商品B', 1499));
        $charge = new DeliveryCharge($twoProductAdded);
        $this->assertSame(500, $charge->amount());
    }

    #[TestDox('商品の合計金額が2000円以上の場合、配送料は無料')]
    public function testChargeFree(): void
    {
        $emptyCart = new ShoppingCart();
        $oneProductAdded = $emptyCart->add(new Product(1, '商品A', 500));
        $twoProductAdded = $oneProductAdded->add(new Product(2, '商品B', 1500));
        $charge = new DeliveryCharge($twoProductAdded);
        $this->assertSame(0, $charge->amount());
    }
}
