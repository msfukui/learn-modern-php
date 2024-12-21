<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DesignPatterns\SpeedMeter\State;

describe('SpeedMeter', function () {

    test('最初は 0 km/h で安全', function () {
        $speedMeter = new SpeedMeter();
        expect($speedMeter->display())
            ->toBe('0.00 km/h green');
        return $speedMeter;
    });

    test('90.0 km/h ではまだ安全', function ($speedMeter) {
        $speedMeter->setSpeed(90.0);
        expect($speedMeter->display())
            ->toBe('90.00 km/h green');
        return $speedMeter;
    })->depends('最初は 0 km/h で安全');

    test('101.0 km/h は危険', function ($speedMeter) {
        $speedMeter->setSpeed(101.0);
        expect($speedMeter->display())
            ->toBe('101.00 km/h red');
        return $speedMeter;
    })->depends('90.0 km/h ではまだ安全');

    test('90.0 km/h ではまだ危険', function ($speedMeter) {
        $speedMeter->setSpeed(90.0);
        expect($speedMeter->display())
            ->toBe('90.00 km/h red');
        return $speedMeter;
    })->depends('101.0 km/h は危険');

    test('80.0 km/h ではまた安全', function ($speedMeter) {
        $speedMeter->setSpeed(80.0);
        expect($speedMeter->display())
            ->toBe('80.00 km/h green');
        return $speedMeter;
    })->depends('90.0 km/h ではまだ危険');
});
