<?php

// 【PHP】オブジェクト指向で学ぶファイナルファンタジー風 CLI アプリの作成
echo "処理の始まり\n\n";

require_once('./classes/Human.php');
require_once('./classes/Enemy.php');
require_once('./classes/Brave.php');

// インスタンス化
$tiida = new Brave('ティーダ');
$goblin = new Enemy('ゴブリン');

$turn = 1;
while ($tiida->getHitPoint() > 0 && $goblin->getHitPoint() > 0) {
    echo "**** $turn ターン目 ****\n\n";

    echo $tiida->getName() . ':' . $tiida->getHitPoint() . ':' . $tiida::MAX_HITPOINT . "\n";
    echo $goblin->getName() . ':' . $goblin->getHitPoint() . ':' . $goblin::MAX_HITPOINT . "\n";
    echo  "\n";

    // 攻撃
    $tiida->doAttack($goblin);
    echo  "\n";

    $goblin->doAttack($tiida);
    echo  "\n";

    $turn++;
}

echo '★★★戦闘終了★★★';
echo  "\n";
echo $tiida->getName() . ':' . $tiida->getHitPoint() . ':' . $tiida::MAX_HITPOINT . "\n";
echo $goblin->getName() . ':' . $goblin->getHitPoint() . ':' . $goblin::MAX_HITPOINT . "\n";
echo  "\n";
