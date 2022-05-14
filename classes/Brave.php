<?php

class Brave extends Human
{
    const MAX_HITPOINT = 120; //最大HPの定義
    private $hitPoint = self::MAX_HITPOINT;   //現在のHP
    private $attackPoint = 30; //攻撃力


    public function __construct($name)
    {
        parent::__construct($name, $this->hitPoint, $this->attackPoint);
    }

    public function doAttack($enemy)
    {
        if (rand(1, 3) === 1) {
            echo '「' . $this->getName() . "」のスキルが発動した！ \n";
            echo "「全力斬り」 \n";
            echo '【' . $enemy->getName() . '】に' . $this->attackPoint . "のダメージ！ \n";
            $enemy->tookDamage($this->attackPoint * 1.5);
        } else {
            parent::doAttack($enemy);
        }
        return true;
    }
}
