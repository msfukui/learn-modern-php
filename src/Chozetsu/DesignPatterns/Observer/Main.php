<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DesignPatterns\Observer;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

require_once __DIR__ . '/../../../../vendor/autoload.php';

$dataStore = new DataStore();

$logger = new Logger("example");
$logger->pushHandler(new StreamHandler('php://stdout'));
$observer = new LoggingObserver($logger);

$observer->watch($dataStore, DataStore::EVENT_SAVE);
$observer->watch($dataStore, DataStore::EVENT_LOAD);

$dataStore->save(['foo' => 'bar']);
