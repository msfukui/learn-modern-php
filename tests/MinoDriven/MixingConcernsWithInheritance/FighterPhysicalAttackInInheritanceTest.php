<?php

namespace LearnModernPhp\MinoDriven\MixingConcernsWithInheritance;

describe('FighterPhysicalAttackInInheritance', function () {

    it('should return 25 for singleAttackDamage', function () {
        $fighterPhysicalAttack = new FighterPhysicalAttackInInheritance();
        expect($fighterPhysicalAttack->singleAttackDamage())->toBe(25);
    });

    it('should return 30 for doubleAttackDamage', function () {
        $fighterPhysicalAttack = new FighterPhysicalAttackInInheritance();
        expect($fighterPhysicalAttack->doubleAttackDamage())->toBe(30);
    });
});
