<?php

declare(strict_types=1);

namespace LearnModernPhp\MinoDriven\RefactoringFlow\After;

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
        if ($customer->isDisabled()) {
            throw new Exception('有効な購入者ではありません');
        }

        if ($comic->isDisabled()) {
            throw new Exception('現在取り扱いのできないコミックです');
        }

        if ($customer->isShortOfPoint($comic)) {
            throw new Exception('所持ポイントが不足しています');
        }

        $this->customerId = $customer->id();
        $this->comicId = $comic->id();
        $this->consumptionPoint = $comic->currentPurchasePoint();
        $this->paymentDateTime = new DateTimeImmutable();
    }
}
