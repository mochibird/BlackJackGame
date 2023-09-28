<?php

class Player
{
    public const INITIAL_CHIP_AMOUNT = 500;
    public const INITIAL_BET_AMOUNT = 0;
    private $name;
    private int $chipsAmount;

    private int $betAmount;
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->chipsAmount = self::INITIAL_CHIP_AMOUNT;
        $this->betAmount = self::INITIAL_BET_AMOUNT;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getChipsAmount(): int
    {
        return $this->chipsAmount;
    }

    public function getBetAmount(): int
    {
        return $this->betAmount;
    }

    public function changeChipsAmount(int $betAmount): void
    {
        $this->chipsAmount -= $betAmount;
    }

    public function changeBetAmount(int $chipsAmount): void
    {
        $this->betAmount += $chipsAmount;
    }
}
