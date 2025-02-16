<?php

namespace LearnModernPhp\MinoDriven\MixingConcernsWithInheritance;

describe('FighterPhysicalAttackInComposition', function () {

    it('should return 25 for singleAttackDamage', function () {
        $fighterPhysicalAttack = new FighterPhysicalAttackInComposition();
        expect($fighterPhysicalAttack->singleAttackDamage())->toBe(25);
    });

    it('should return 30 for doubleAttackDamage', function () {
        $fighterPhysicalAttack = new FighterPhysicalAttackInComposition();
        expect($fighterPhysicalAttack->doubleAttackDamage())->toBe(30);
    });
});
