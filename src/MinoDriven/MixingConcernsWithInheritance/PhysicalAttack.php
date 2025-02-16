<?php

declare(strict_types=1);

namespace LearnModernPhp\MinoDriven\MixingConcernsWithInheritance;

class PhysicalAttack
{
    public function doubleAttackDamage(): int
    {
        // return 20;
        // return $this->singleAttackDamage() * 4;
        // この例だと基底クラスに閉じた操作の変更であれば影響はないのでは..?
        // むしろ派生クラスに変更することがわかるから、影響を漏れなく確認すれば
        // よいのでは..?
        // 継承ではなく委譲だったとしても同じ様に委譲先の影響の確認は必要では..?
        return self::singleAttackDamage() * 4;
    }

    public function singleAttackDamage(): int
    {
        return 5;
    }
}
