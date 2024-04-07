<?php

declare (strict_types=1);

namespace FizzBuzzCounter;

// お題:
// 1..100 までの数をプリントする
// ただし 3 の倍数のときは Fizz, 5 の倍数のときは Buzz,
// 両方の倍数のときは FizzBuzz とプリントする

function main1(): void
{
    echo "1 ";
    echo "2 ";
    echo "Fizz ";
    echo "4 ";
    echo "Buzz ";
    echo "Fizz ";
    echo "7 ";
    echo "8 ";
    echo "Fizz ";
    echo "Buzz ";
    echo "11 ";
    echo "Fizz ";
    echo "13 ";
    echo "14 ";
    echo "FizzBuzz ";
    echo "16 ";
    echo "17 ";
    echo "Fizz ";
    echo "19 ";
    echo "Buzz ";
    echo "Fizz ";
    echo "22 ";
    echo "23 ";
    echo "Fizz ";
    echo "Buzz ";
    echo "26 ";
    echo "Fizz ";
    echo "28 ";
    echo "29 ";
    echo "FizzBuzz ";
    echo "31 ";
    echo "32 ";
    echo "Fizz ";
    echo "34 ";
    echo "Buzz ";
    echo "Fizz ";
    echo "37 ";
    echo "38 ";
    echo "Fizz ";
    echo "Buzz ";
    echo "41 ";
    echo "Fizz ";
    echo "43 ";
    echo "44 ";
    echo "FizzBuzz ";
    echo "46 ";
    echo "47 ";
    echo "Fizz ";
    echo "49 ";
    echo "Buzz ";
    echo "Fizz ";
    echo "52 ";
    echo "53 ";
    echo "Fizz ";
    echo "Buzz ";
    echo "56 ";
    echo "Fizz ";
    echo "58 ";
    echo "59 ";
    echo "FizzBuzz ";
    echo "61 ";
    echo "62 ";
    echo "Fizz ";
    echo "64 ";
    echo "Buzz ";
    echo "Fizz ";
    echo "67 ";
    echo "68 ";
    echo "Fizz ";
    echo "Buzz ";
    echo "71 ";
    echo "Fizz ";
    echo "73 ";
    echo "74 ";
    echo "FizzBuzz ";
    echo "76 ";
    echo "77 ";
    echo "Fizz ";
    echo "79 ";
    echo "Buzz ";
    echo "Fizz ";
    echo "82 ";
    echo "83 ";
    echo "Fizz ";
    echo "Buzz ";
    echo "86 ";
    echo "Fizz ";
    echo "88 ";
    echo "89 ";
    echo "FizzBuzz ";
    echo "91 ";
    echo "92 ";
    echo "Fizz ";
    echo "94 ";
    echo "Buzz ";
    echo "Fizz ";
    echo "97 ";
    echo "98 ";
    echo "Fizz ";
    echo "Buzz ";
    echo "\n";
}

function main2(): void
{
    for ($i = 1; $i <= 100; $i++) {
        if ($i % 15 === 0) {
            echo "FizzBuzz ";
        } elseif ($i % 3 === 0) {
            echo "Fizz ";
        } elseif ($i % 5 === 0) {
            echo "Buzz ";
        } else {
            echo $i . " ";
        }
    }
    echo "\n";
}

function main3(): void
{
    echo "1 2 Fizz 4 Buzz Fizz 7 8 Fizz Buzz 11 Fizz 13 14 FizzBuzz 16 17 Fizz 19 Buzz Fizz 22 23 Fizz Buzz 26 Fizz 28 29 FizzBuzz 31 32 Fizz 34 Buzz Fizz 37 38 Fizz Buzz 41 Fizz 43 44 FizzBuzz 46 47 Fizz 49 Buzz Fizz 52 53 Fizz Buzz 56 Fizz 58 59 FizzBuzz 61 62 Fizz 64 Buzz Fizz 67 68 Fizz Buzz 71 Fizz 73 74 FizzBuzz 76 77 Fizz 79 Buzz Fizz 82 83 Fizz Buzz 86 Fizz 88 89 FizzBuzz 91 92 Fizz 94 Buzz Fizz 97 98 Fizz Buzz \n";
}

function main4(): void
{
    $s = "";
    for ($i = 1; $i <= 100; $i++) {
        if ($i % 15 === 0) {
            $s .= "FizzBuzz ";
        } elseif($i % 3 === 0) {
            $s .= "Fizz ";
        } elseif ($i % 5 === 0) {
            $s .= "Buzz ";
        } else {
            $s .= "$i ";
        }
    }
    echo "$s\n";
}

function benchmark(callable $func): void
{
    $start = microtime(true);
    $func();
    $end = microtime(true);
    echo "time: " . ($end - $start) . " sec\n";
}

benchmark(main1(...));
benchmark(main2(...));
benchmark(main3(...));
benchmark(main4(...));
