<?php

require_once('Player.php');
require_once('GamePlayer.php');
require_once('InputMessage.php');
require_once('OutputMessage.php');
require_once('Validator.php');

class Game{
    use Validator;


    private Dealer $dealer;
    private Deck $deck;
    private GamePlayer $gamePlayer;
    private int $currentNumOfGames;
    public function __construct(Dealer $dealer, Deck $deck)
    {
        $this->dealer = $dealer;
        $this->deck = $deck;
        $this->gamePlayer = new GamePlayer('あなた');
    }

    public function getDealer(): Dealer
    {
        return $this->dealer;
    }

    public function getDeck(): Deck
    {
        return $this->deck;
    }

    public function start(): void
    {
        $this->setBetAmount();
    }

    public function setBetAmount(): void
    {
        echo OutputMessage::getBetAmountMessage($this->gamePlayer);
        $inputNum = '';
        while ($inputNum === '') {
            $inputNum = trim(fgets(STDIN));
            $error = $this->validateInputChipsAmount($this->gamePlayer, $this->dealer->getChipCalculator(), $inputNum);
            if (empty($error)) {
                $this->gamePlayer->changeChipsAmount($inputNum);
                $this->gamePlayer->changeBetAmount($inputNum);
                echo InputMessage::getBetResultMessage($this->gamePlayer);
            } else {
                echo $error;
                $inputNum = '';
            }
        }
    }
}
