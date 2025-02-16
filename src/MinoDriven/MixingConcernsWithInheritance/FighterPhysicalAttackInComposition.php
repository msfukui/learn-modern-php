<?php

declare(strict_types=1);

namespace LearnModernPhp\MinoDriven\MixingConcernsWithInheritance;

final class FighterPhysicalAttackInComposition
{
    private PhysicalAttack $physicalAttack;

    public function __construct()
    {
        $this->physicalAttack = new PhysicalAttack();
    }

    public function singleAttackDamage(): int
    {
        return $this->physicalAttack->singleAttackDamage() + 20;
    }

    public function doubleAttackDamage(): int
    {
        return $this->physicalAttack->doubleAttackDamage() + 10;
    }
}
