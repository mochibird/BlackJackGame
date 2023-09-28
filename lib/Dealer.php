<?php

/**
 * Dealer クラスはディーラーの役割を担当します。
 */
class Dealer
{
    private $dealerPlayer;    // DealerPlayer インスタンスを保持します。ディーラープレイヤーとの対話に使用されます。
    private $chipCalculator;  // ChipCalculator インスタンスを保持します。チップ計算に使用されます。
    private $judge;           // Judge インスタンスを保持します。ゲームの判定に使用されます。

    /**
     * Dealer クラスのコンストラクタ
     *
     * @param DealerPlayer $dealerPlayer DealerPlayer インスタンス
     * @param ChipCalculator $chipCalculator ChipCalculator インスタンス
     * @param Judge $judge Judge インスタンス
     */
    public function __construct(
        DealerPlayer $dealerPlayer,
        ChipCalculator $chipCalculator,
        Judge $judge
    ) {
        $this->dealerPlayer = $dealerPlayer;
        $this->chipCalculator = $chipCalculator;
        $this->judge = $judge;
    }

    /**
     * DealerPlayer インスタンスを取得します。
     *
     * @return DealerPlayer DealerPlayer インスタンス
     */
    public function getDealerPlayer(): DealerPlayer
    {
        return $this->dealerPlayer;
    }

    /**
     * ChipCalculator インスタンスを取得します。
     *
     * @return ChipCalculator ChipCalculator インスタンス
     */
    public function getChipCalculator(): ChipCalculator
    {
        return $this->chipCalculator;
    }
}
