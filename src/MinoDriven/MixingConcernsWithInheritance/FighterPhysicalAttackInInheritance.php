<?php

declare(strict_types=1);

namespace LearnModernPhp\MinoDriven\MixingConcernsWithInheritance;

final class FighterPhysicalAttackInInheritance extends PhysicalAttack
{
    public function singleAttackDamage(): int
    {
        return parent::singleAttackDamage() + 20;
    }

    public function doubleAttackDamage(): int
    {
        return parent::doubleAttackDamage() + 10;
    }
}
