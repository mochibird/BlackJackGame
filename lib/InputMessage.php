<?php

class InputMessage
{
    public static function getBetResultMessage(GamePlayer $gamePlayer): string
    {
        return $gamePlayer->getName() . 'のベットした額は' .  $gamePlayer->getBetAmount() . 'です。(残額' . $gamePlayer->getChipsAmount() . ')' . PHP_EOL;
    }
}
