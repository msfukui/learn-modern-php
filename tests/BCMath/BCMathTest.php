<?php

declare(strict_types=1);

namespace LearnModernPhp\BCMath;

beforeEach(function () {
    bcscale(0);
});

describe('BCMath', function () {

    describe('PHP 5,7,8', function () {

        describe('#bcadd', function () {

            it('should add two arbitrary precision numbers', function () {
                expect(bcadd('1.234', '5'))->toBe('6');
                expect(bcadd('1.234', '5', 4))->toBe('6.2340');
            });
        });

        describe('#bccomp', function () {

            it('should compare two arbitrary precision numbers', function () {
                expect(bccomp('1', '2'))->toBe(-1);
                expect(bccomp('1.00001', '1', 3))->toBe(0);
                expect(bccomp('1.00001', '1', 5))->toBe(1);
            });
        });

        describe('#bcdiv', function () {

            it('should divide two arbitrary precision numbers', function () {
                expect(bcdiv('105', '6.55957', 3))->toBe('16.007');
            });
        });

        describe('#bcmod', function () {

            it('should get modulus of two arbitrary precision numbers', function () {
                expect(bcmod('5', '3'))->toBe('2');
                expect(bcmod('5', '-3'))->toBe('2');
                expect(bcmod('-5', '3'))->toBe('-2');
                expect(bcmod('-5', '-3'))->toBe('-2');
                expect(bcmod('5.7', '1.3', 1))->toBe('0.5');
            });
        });

        describe('#bcmul', function () {

            it('should multiply two arbitrary precision numbers', function () {
                expect(bcmul('1.34747474747', '35', 3))->toBe('47.161');
                expect(bcmul('2', '4'))->toBe('8');
                expect(bcmul('2', '5', 2))->toBe('10.00');
            });
        });

        describe('#bcpow', function () {

            it('should raise an arbitrary precision number to another', function () {
                expect(bcpow('4.2', '3', 2))->toBe('74.08');
                expect(bcpow('5', '2', 2))->toBe('25.00');
            });
        });

        describe('#bcpowmod', function () {

            it('should raise an arbitrary precision number to another, reduced by a specified modulus', function () {
                expect(bcpowmod('5', '2', '3', 2))->toBe('1.00');
            });

            it('should throws a ValueError if num has a fractional part', function () {
                expect(bcpowmod('4.2', '3', '2', 2));
            })->throws(\ValueError::class);
        });

        describe('#bcscale', function () {

            it('should set or get default scale parameter for all bc math functions', function () {
                bcscale(3);
                expect(bcdiv('105', '6.55957'))->toBe('16.007');
                bcscale(0);
            });
        });

        describe('#bcsqrt', function () {

            it('should get the square root of an arbitrary precision number', function () {
                expect(bcsqrt('2', 3))->toBe('1.414');
                expect(bcsqrt('0'))->toBe('0');
            });

            it('should throws a ValueError if num is less than 0', function () {
                expect(bcsqrt('-1'));
            })->throws(\ValueError::class);
        });

        describe('#bcsub', function () {

            it('should subtract one arbitrary precision number from another', function () {
                expect(bcsub('1.234', '5'))->toBe('-3');
                expect(bcsub('1.234', '5', 4))->toBe('-3.7660');
            });
        });
    });

    describe('PHP >= 8.4.0', function () {

        describe('#bcceil', function () {

            it('should round up arbitrary precision number', function () {
                expect(bcceil('4.3'))->toBe('5');
                expect(bcceil('9.999'))->toBe('10');
                expect(bcceil('-3.14'))->toBe('-3');
            });
        });

        describe('#bcdivmod', function () {

            it('should get the quotient and modulus of an arbitrary precision number', function () {
                expect(bcdivmod('5', '3'))->toBe(['1', '2']);
                expect(bcdivmod('5', '-3'))->toBe(['-1', '2']);
                expect(bcdivmod('-5', '3'))->toBe(['-1', '-2']);
                expect(bcdivmod('-5', '-3'))->toBe(['1', '-2']);
                expect(bcdivmod('5.7', '1.3', 1))->toBe(['4', '0.5']);
            });
        });

        describe('#bcfloor', function () {

            it('should round down arbitrary precision number', function () {
                expect(bcfloor('4.3'))->toBe('4');
                expect(bcfloor('9.999'))->toBe('9');
                expect(bcfloor('-3.14'))->toBe('-4');
            });
        });

        describe('#bcround', function () {

            it('should round arbitrary precision number', function () {
                expect(bcround('3.4'))->toBe('3');
                expect(bcround('3.5'))->toBe('4');
                expect(bcround('3.6'))->toBe('4');
            });
        });
    });
});
