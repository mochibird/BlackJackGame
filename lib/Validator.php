<?php

trait Validator
{
    /**
     * チップ額の入力値をバリデーションする関数
     *
     * @param GamePlayer $gamePlayer ゲームプレイヤーのインスタンス
     * @param ChipCalculator $chipCalculator チップ計算機のインスタンス
     * @param string $inputNumOfBetAmount バリデーション対象のチップ額の入力値
     * @return string エラーメッセージ（バリデーションエラーがない場合は空文字列）
     */
    public function validateInputChipsAmount(GamePlayer $gamePlayer, ChipCalculator $chipCalculator, string $inputNumOfBetAmount): string
    {
        $error = '';
        // 利用可能なベットチップ額のリスト
        $listOfAvailableBettingChipAmounts = [
            $chipCalculator::THIRTY_DOLLARS,
            $chipCalculator::FIFTY_DOLLARS,
            $chipCalculator::ONE_HUNDRED_DOLLARS,
            $chipCalculator::FIVE_HUNDRED_DOLLARS,
            $chipCalculator::ONE_THOUSAND_DOLLARS,
        ];

        // 入力値が空かどうかを確認
        if (!strlen($inputNumOfBetAmount)) {
            $error .= 'ベットする額が入力されていません。' . PHP_EOL;
        }
        // 入力値が半角数字かどうかを確認
        elseif (!preg_match('/^[0-9]+$/', $inputNumOfBetAmount)) {
            $error .= 'ベットする額を半角数字で入力してください。' . PHP_EOL;
        }
        // 入力値が利用可能なベットチップ額の中にあるかどうかを確認
        elseif (!in_array((int)$inputNumOfBetAmount, $listOfAvailableBettingChipAmounts)) {
            $error .= 'ベットする額を(' . implode(', ', $listOfAvailableBettingChipAmounts) .
                ')から半角数字で入力してください。' .  PHP_EOL;
        }
        // プレイヤーの持つチップ額よりも大きいベットはできないことを確認
        elseif ($gamePlayer->getChipsAmount() < (int)$inputNumOfBetAmount) {
            $error .= 'ベットする額は所有しているチップ額以下の半角数字で入力してください。' . PHP_EOL;
        }

        return $error;
    }
}
