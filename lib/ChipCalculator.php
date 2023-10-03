<?php

class ChipCalculator
{
    const THIRTY_DOLLARS = 30;
    const FIFTY_DOLLARS = 50;
    const ONE_HUNDRED_DOLLARS = 100;
    const FIVE_HUNDRED_DOLLARS = 500;
    const ONE_THOUSAND_DOLLARS = 1000;

    public function calcChips(GamePlayer $gamePlayer)
    {
        $chips = $this->calcChipsByResult($gamePlayer);
        $gamePlayer->changeChipsAmount($chips);
        $this->displayChipsAmount($gamePlayer);
    }

    public function calcChipsByResult(GamePlayer $gamePlayer): int
    {
        $chips = 0;
        switch ($gamePlayer->getStatus()) {
            case $gamePlayer::WIN:
                $chips = $gamePlayer->getBetAmount() * 2;
            break;
            case $gamePlayer::LOSE:
                $chips = 0;
            break;
            case $gamePlayer::DRAW:
                $chips = $gamePlayer->getBetAmount();
            break;
        }
        return $chips;
    }

    public function displayChipsAmount(GamePlayer $gamePlayer): void
    {
        switch ($gamePlayer->getStatus()) {
            case $gamePlayer::WIN:
                echo OutputMessage::getWinAndGetChipsMessage();
                break;
            case $gamePlayer::LOSE:
                echo OutputMessage::getLoseAndLoseChipsMessage();
                break;
            case $gamePlayer::DRAW:
                echo OutputMessage::getDrawAndKeepChipsMessage();
                break;
        }
    }
}
