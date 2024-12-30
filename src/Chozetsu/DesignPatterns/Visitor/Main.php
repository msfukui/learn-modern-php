<?php

declare(strict_types=1);

namespace LearnModernPhp\Chozetsu\DesignPatterns\Visitor;

require_once __DIR__ . '/../../../../vendor/autoload.php';

$rootNode = new Node();
$rootNode->accept(function (Node $node) {
    echo "Visiting root node\n";
    $tmp = $node;
});
