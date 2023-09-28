<?php

class Dealer
{
    private $dealerPlayer;
    private $chipCalculator;
    private $judge;
    public function __construct(
        DealerPlayer $dealerPlayer,
        ChipCalculator $chipCalculator,
        Judge $judge
    ) {
        $this->dealerPlayer = $dealerPlayer;
        $this->chipCalculator = $chipCalculator;
        $this->judge = $judge;
    }

    public function getDealerPlayer(): DealerPlayer
    {
        return $this->dealerPlayer;
    }

    public function getChipCalculator(): ChipCalculator
    {
        return $this->chipCalculator;
    }
}
