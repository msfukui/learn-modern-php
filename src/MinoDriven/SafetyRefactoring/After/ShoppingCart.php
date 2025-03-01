<?php

declare(strict_types=1);

namespace LearnModernPhp\MinoDriven\SafetyRefactoring\After;

use LearnModernPhp\MinoDriven\SafetyRefactoring\Product;

final readonly class ShoppingCart
{
    /**
     * @param array<Product> $products
     */
    public function __construct(
        private array $products = [],
    ) {
    }

    public function add(Product $product): ShoppingCart
    {
        $adding = $this->products;
        $adding[] = $product;
        return new ShoppingCart($adding);
    }

    /**
     * @return int 商品の合計金額
     */
    public function totalPrice(): int
    {
        $totalPrice = 0;
        foreach ($this->products as $product) {
            $totalPrice += $product->price();
        }
        return $totalPrice;
    }
}
