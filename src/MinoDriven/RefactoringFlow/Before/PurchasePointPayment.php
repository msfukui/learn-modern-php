<?php

declare(strict_types=1);

namespace LearnModernPhp\MinoDriven\RefactoringFlow\Before;

use DateTimeImmutable;
use Exception;
use LearnModernPhp\MinoDriven\RefactoringFlow\Comic;
use LearnModernPhp\MinoDriven\RefactoringFlow\ComicId;
use LearnModernPhp\MinoDriven\RefactoringFlow\Customer;
use LearnModernPhp\MinoDriven\RefactoringFlow\CustomerId;
use LearnModernPhp\MinoDriven\RefactoringFlow\PurchasePoint;

final readonly class PurchasePointPayment
{
    public CustomerId $customerId; // 購入者のID
    public ComicId $comicId; // 購入するWebコミックのID
    public PurchasePoint $consumptionPoint; // 購入で消費するポイント
    public DateTimeImmutable $paymentDateTime; // 購入日時

    /**
     * @throws Exception
     */
    public function __construct(
        Customer $customer,
        Comic $comic,
    ) {
        if ($customer->isEnabled()) {
            $this->customerId = $customer->id();
            if ($comic->isEnabled()) {
                $this->comicId = $comic->id();
                if ($comic->currentPurchasePoint()->amount() <= $customer->possessionPoint()->amount()) {
                    $this->consumptionPoint = $comic->currentPurchasePoint();
                    $this->paymentDateTime = new DateTimeImmutable();
                } else {
                    throw new Exception('所持ポイントが不足しています');
                }
            } else {
                throw new Exception('現在取り扱いのできないコミックです');
            }
        } else {
            throw new Exception('有効な購入者ではありません');
        }
    }
}
