<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DesignPatterns\SpeedMeter\State;

require_once __DIR__ . '/../../../../../vendor/autoload.php';

$speedMeter = new SpeedMeter();
echo $speedMeter->display() . PHP_EOL;

$speedMeter->setSpeed(90.0);
echo $speedMeter->display() . PHP_EOL;

$speedMeter->setSpeed(101.0);
echo $speedMeter->display() . PHP_EOL;

$speedMeter->setSpeed(90.0);
echo $speedMeter->display() . PHP_EOL;

$speedMeter->setSpeed(80.0);
echo $speedMeter->display() . PHP_EOL;
