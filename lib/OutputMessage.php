<?php

class OutputMessage
{
    public static function getBetAmountMessage(Player $player): string
    {
        return '1ゲームを行うにあたり賭けるチップ額を設定します。' . PHP_EOL .
        $player->getName() . 'は' . 'チップを' . $player->getChipsAmount() . 'ドル所有しています。' . PHP_EOL .
        'ベットする額を所有しているチップ以下で(10・30・50・100・500・1000)の中の数値から半角数字で入力してください。' . PHP_EOL;
    }

}
