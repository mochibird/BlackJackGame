<?php

// Dealer クラスはディーラーの役割を担当します。
require_once('Player.php');
require_once('GamePlayer.php');
require_once('InputMessage.php');
require_once('OutputMessage.php');
require_once('Validator.php');

class Game
{
    use Validator;

    private Dealer $dealer;        // ゲームのディーラーを保持します。
    private Deck $deck;            // ゲームのデッキを保持します。
    private GamePlayer $gamePlayer; // ゲームプレイヤーを保持します。
    private int $currentNumOfGames; // 現在のゲーム回数を保持します。

    /**
     * Game クラスのコンストラクタ
     *
     * @param Dealer $dealer ゲームのディーラー
     * @param Deck $deck ゲームのデッキ
     */
    public function __construct(Dealer $dealer, Deck $deck)
    {
        $this->dealer = $dealer;
        $this->deck = $deck;
        $this->gamePlayer = new GamePlayer('あなた');
    }

    /**
     * ゲームのディーラーを取得します。
     *
     * @return Dealer ゲームのディーラー
     */
    public function getDealer(): Dealer
    {
        return $this->dealer;
    }

    /**
     * ゲームのデッキを取得します。
     *
     * @return Deck ゲームのデッキ
     */
    public function getDeck(): Deck
    {
        return $this->deck;
    }

    /**
     * ゲームを開始します。
     */
    public function start(): void
    {
        $this->setBetAmount();
    }

    /**
     * ベット額を設定します。
     *
     * @return void
     */
    public function setBetAmount(): void
    {
        // ベット額のメッセージを表示
        echo OutputMessage::getBetAmountMessage($this->gamePlayer);
        $inputNum = '';

        // ユーザーからの入力を待ちます
        while ($inputNum === '') {
            $inputNum = trim(fgets(STDIN));

            // 入力値のバリデーション
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
