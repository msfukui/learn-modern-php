<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DesignPatterns\Command;

require_once __DIR__ . '/../../../../vendor/autoload.php';

use LearnModernPhp\Chozetsu\DesignPatterns\Command\UI\SelectionUI;
use LearnModernPhp\Chozetsu\DesignPatterns\Command\UseCase\Cat;
use LearnModernPhp\Chozetsu\DesignPatterns\Command\UseCase\Command\BuyPetCommand;
use LearnModernPhp\Chozetsu\DesignPatterns\Command\UseCase\Command\CancelPetCommand;
use LearnModernPhp\Chozetsu\DesignPatterns\Command\UseCase\Dog;
use LearnModernPhp\Chozetsu\DesignPatterns\Command\UseCase\PetShop;

function createPetSelectionUI(PetShop $shop): SelectionUI
{
    $ui = new SelectionUI();
    $ui->registerCommand('猫をください', new BuyPetCommand($shop, new Cat()));
    $ui->registerCommand('犬をください', new BuyPetCommand($shop, new Dog()));
    $ui->registerCommand('やっぱりやめます', new CancelPetCommand($shop));
    return $ui;
}

$ui = createPetSelectionUI(new PetShop());
echo $ui->help() . PHP_EOL;

$userInput = (int)fgets(STDIN);
$ui->select($userInput);
