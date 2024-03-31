<?php

declare(strict_types=1);

namespace LearnModernPhp\SevenInRow;

enum KindOfSuit: string
{
    case HEARTS = 'hearts';
    case DIAMONDS = 'diamonds';
    case CLUBS = 'clubs';
    case SPADES = 'spades';
}
