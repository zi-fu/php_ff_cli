<?php

function isFinish($objects)
{
    $deathCnt = 0; // HPが0以下の仲間の数
    foreach ($objects as $object) {
        if ($object->getHitPoint() > 0) {
            return false;
        }
        $deathCnt++;
    }
    // 仲間の数が死亡数（HPが０以下の数）と同じであればtrueを返す
    if ($deathCnt === count($objects)) {
        return true;
    }
}
