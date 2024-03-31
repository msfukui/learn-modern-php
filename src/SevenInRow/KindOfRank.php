<?php

declare(strict_types=1);

namespace LearnModernPhp\SevenInRow;

enum KindOfRank: string
{
    case ACE = 'ace';
    case TWO = 'two';
    case THREE = 'three';
    case FOUR = 'four';
    case FIVE = 'five';
    case SIX = 'six';
    case SEVEN = 'seven';
    case EIGHT = 'eight';
    case NINE = 'nine';
    case TEN = 'ten';
    case JACK = 'jack';
    case QUEEN = 'queen';
    case KING = 'king';
}
