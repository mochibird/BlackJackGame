<?php

/**
 * InputMessage クラスは入力メッセージを生成するためのユーティリティです。
 */
class InputMessage
{
    /**
     * ベット結果のメッセージを生成します。
     *
     * @param GamePlayer $gamePlayer プレイヤーの情報を持つ GamePlayer インスタンス
     * @return string ベット結果のメッセージ
     */
    public static function getBetResultMessage(GamePlayer $gamePlayer): string
    {
        return $gamePlayer->getName() . 'のベットした額は' .  $gamePlayer->getBetAmount() . 'です。(残額' . $gamePlayer->getChipsAmount() . ')' . PHP_EOL;
    }
}
