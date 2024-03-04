<?php

declare(strict_types=1);

namespace LearnModernPhp\DesignForTestability;

use DateTimeImmutable;

class Greeter
{
    public function greet(DateTimeImmutable $now = new DateTimeImmutable('now'), string $locale = 'ja'): string
    {
        $hour = (int) $now->format('H');
        if ($hour >= 18 || $hour < 5) {
            return $this->localeMessage('こんばんは', $locale);
        }
        if ($hour >= 12) {
            return $this->localeMessage('こんにちは', $locale);
        }
        return $this->localeMessage('おはようございます', $locale);
    }

    private function localeMessage(string $message, string $locale): string
    {
        if ($locale === 'en') {
            return match ($message) {
                'おはようございます' => 'Good Morning',
                'こんにちは' => 'Good Afternoon',
                'こんばんは' => 'Good Evening',
                default => $message,
            };
        }
        return $message;
    }
}
