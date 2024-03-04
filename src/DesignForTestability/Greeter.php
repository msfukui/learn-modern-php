<?php

declare(strict_types=1);

namespace LearnModernPhp\DesignForTestability;

use DateTimeImmutable;

class Greeter
{
    public function greet(DateTimeImmutable $now = new DateTimeImmutable('now')): string
    {
        $hour = (int) $now->format('H');
        if ($hour >= 18 || $hour < 5) {
            return 'こんばんは';
        }
        if ($hour >= 12) {
            return 'こんにちは';
        }
        return 'おはようございます';
    }
}
