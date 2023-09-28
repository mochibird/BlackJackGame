<?php

/**
 * Player クラスはプレイヤーの情報を表現します。
 */
class Player
{
    public const INITIAL_CHIP_AMOUNT = 500; // 初期のチップ額
    public const INITIAL_BET_AMOUNT = 0;   // 初期のベット額

    private $name;           // プレイヤーの名前
    private int $chipsAmount; // プレイヤーのチップ額

    private int $betAmount;   // プレイヤーのベット額

    /**
     * Player クラスのコンストラクタ
     *
     * @param string $name プレイヤーの名前
     */
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->chipsAmount = self::INITIAL_CHIP_AMOUNT;
        $this->betAmount = self::INITIAL_BET_AMOUNT;
    }

    /**
     * プレイヤーの名前を取得します。
     *
     * @return string プレイヤーの名前
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * プレイヤーのチップ額を取得します。
     *
     * @return int プレイヤーのチップ額
     */
    public function getChipsAmount(): int
    {
        return $this->chipsAmount;
    }

    /**
     * プレイヤーのベット額を取得します。
     *
     * @return int プレイヤーのベット額
     */
    public function getBetAmount(): int
    {
        return $this->betAmount;
    }

    /**
     * プレイヤーのチップ額を変更します。
     *
     * @param int $betAmount 変更するチップ額
     * @return void
     */
    public function changeChipsAmount(int $betAmount): void
    {
        $this->chipsAmount -= $betAmount;
    }

    /**
     * プレイヤーのベット額を変更します。
     *
     * @param int $chipsAmount 変更するベット額
     * @return void
     */
    public function changeBetAmount(int $chipsAmount): void
    {
        $this->betAmount += $chipsAmount;
    }
}
