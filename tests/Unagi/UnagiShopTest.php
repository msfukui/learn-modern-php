<?php

declare(strict_types=1);

namespace LearnModernPhp\Unagi;

describe('UnagiShop#get', function () {

    it('should return 4', function () {
        expect(
            (new UnagiShop(
                6,
                [
                    [3, 2],
                    [1, 6],
                    [2, 5],
                ]
            ))->get()
        )->toBe(4);
    });

    it('should return 12', function () {
        expect(
            (new UnagiShop(
                12,
                [
                    [4, 6],
                    [4, 8],
                    [4, 10],
                    [4, 12],
                    [4, 2],
                    [4, 4],
                ]
            ))->get()
        )->toBe(12);
    });
});
