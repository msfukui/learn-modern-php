<?php

declare(strict_types=1);

namespace LearnModernPhp\DddIntro\Domain\Circle;

use InvalidArgumentException;

final readonly class CircleName
{
    public function __construct(
        private string $name
    ) {
        if (strlen($name) < 3) {
            throw new InvalidArgumentException('サークル名は3文字以上です。');
        }
        if (strlen($name) > 20) {
            throw new InvalidArgumentException('サークル名は20文字以下です。');
        }
    }

    public function getName(): string
    {
        return $this->name;
    }
}
