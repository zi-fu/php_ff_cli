<?php

// 【PHP】オブジェクト指向で学ぶファイナルファンタジー風 CLI アプリの作成
echo "処理の始まり\n\n";

require_once('./classes/Human.php');
require_once('./classes/Enemy.php');
require_once('./classes/Brave.php');

require_once('./classes/BlackMage.php');
require_once('./classes/WhiteMage.php');

// インスタンス化
if (isset($members)) {
    $members = $array();
}

$members[] = new Brave('ティーダ');
$members[] = new WhiteMage('ユウナ');
$members[] = new BlackMage('ルールー');

if (isset($enemies)) {
    $enemies = $array();
}
$enemies[] = new Enemy('ゴブリン', 20);
$enemies[] = new Enemy('ボム', 25);
$enemies[] = new Enemy('モルボル', 30);

// $tiida = new Brave('ティーダ');
// $goblin = new Enemy('ゴブリン');

$turn = 1;

$isFinishFlg = false;

// while ($tiida->getHitPoint() > 0 && $goblin->getHitPoint() > 0) {
while (!$isFinishFlg) {
    echo "**** $turn ターン目 ****\n\n";

    // 現在のHPの表示
    foreach ($members as $member) {
        echo $member->getName() . ':' . $member->getHitPoint() . ':' . $member::MAX_HITPOINT . "\n";
    }
    echo  "\n";

    foreach ($enemies as $enemy) {
        echo $enemy->getName() . ':' . $enemy->getHitPoint() . ':' . $enemy::MAX_HITPOINT . "\n";
    }
    echo  "\n";

    // 攻撃
    foreach ($members as $member) {
        $enemyIndex = rand(0, count($enemies)-1);
        $enemy = $enemies[$enemyIndex];
        // 白魔道士の場合、味方のオブジェクトも渡す
        if (get_class($member) == "WhiteMage") {
            $member->doAttackWhiteMage($enemy, $member);
        } else {
            $member->doAttack($enemy);
        }
        // echo  "\n";
    }
    echo  "\n";

    foreach ($enemies as $enemy) {
        $memberIndex = rand(0, count($members)-1);
        $member = $members[$memberIndex];
        $enemy->doAttack($member);
        // echo  "\n";
    }
    echo  "\n";

    // 仲間の全滅チェック
    $deathCnt = 0;
    foreach ($members as $member) {
        if ($member->getHitPoint() > 0) {
            $isFinishFlg = false;
            break;
        }
        $deathCnt++;
    }
    if ($deathCnt === count($members)) {
        $isFinishFlg = true;
        echo "GAME OVER ....\n\n";
        break;
    }
    // 敵の全滅チェック
    $deathCnt = 0;
    foreach ($enemies as $enemy) {
        if ($enemy->getHitPoint() > 0) {
            $isFinishFlg = false;
            break;
        }
        $deathCnt++;
    }
    if ($deathCnt === count($enemies)) {
        $isFinishFlg = true;
        echo "♪♪♪ファンファーレ♪♪♪\n\n";
        break;
    }



    $turn++;
}

echo '★★★戦闘終了★★★';
echo  "\n";
// echo $tiida->getName() . ':' . $tiida->getHitPoint() . ':' . $tiida::MAX_HITPOINT . "\n";
// echo $goblin->getName() . ':' . $goblin->getHitPoint() . ':' . $goblin::MAX_HITPOINT . "\n";
// echo  "\n";

// 現在のHPの表示
foreach ($members as $member) {
    echo $member->getName() . ':' . $member->getHitPoint() . ':' . $member::MAX_HITPOINT . "\n";
}
echo  "\n";

foreach ($enemies as $enemy) {
    echo $enemy->getName() . ':' . $enemy->getHitPoint() . ':' . $enemy::MAX_HITPOINT . "\n";
}
echo  "\n";
