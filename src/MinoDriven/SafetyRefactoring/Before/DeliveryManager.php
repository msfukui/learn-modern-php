<?php

declare(strict_types=1);

namespace LearnModernPhp\MinoDriven\SafetyRefactoring\Before;

use LearnModernPhp\MinoDriven\SafetyRefactoring\Product;

final readonly class DeliveryManager
{
    /**
     * @param array<Product> $products 配送対象の商品リスト
     * @return int 配送料
     */
    public static function deliverCharge(array $products): int
    {
        $totalPrice = 0;
        foreach ($products as $product) {
            $totalPrice += $product->price();
        }
        if ($totalPrice < 2000) {
            $charge = 500;
        } else {
            $charge = 0;
        }
        return $charge;
    }
}
