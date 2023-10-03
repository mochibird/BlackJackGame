<?php

require_once('lib/Game.php');
require_once('lib/Dealer.php');
require_once('lib/ChipCalculator.php');
require_once('lib/Judge.php');
require_once('lib/DealerPlayer.php');
require_once('lib/Deck.php');

$dealer = new Dealer(
    new DealerPlayer('ディーラー'),
    new ChipCalculator(),
    new Judge(),
);
$deck = new Deck();
$game = new Game('win', $dealer, $deck);
$game->start();
