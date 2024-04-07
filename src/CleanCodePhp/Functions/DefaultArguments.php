<?php

declare(strict_types=1);

namespace LearnModernPhp\CleanCodePhp\Functions;

final class DefaultArguments
{
    public function BadcreateMicrobrewery(?string $breweryName = 'Hipster Brew Co.'): string
    {
        return $breweryName;
    }

    public function NotBadcreateMicrobrewery(?string $name): string
    {
        $breweryName = $name ?: 'Hipster Brew Co.';
        return $breweryName;
    }

    public function GoodcreateMicrobrewery(?string $breweryName = 'Hipster Brew Co.'): string
    {
        return $breweryName;
    }
}
