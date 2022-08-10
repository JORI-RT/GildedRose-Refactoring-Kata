<?php

declare(strict_types=1);

namespace GildedRose\Item;

class Nomal extends BaseItem
{
	/**
	 * 通常アイテムの品質を更新する
	 * ●要件
	 *   販売するための残り日数が無くなると、Quality値は2小さくなります。
	 *  Quality値は決してマイナスにはなりません。
	 *  Quality値は50以上にはなりません。
	 */
	public function updateQuality() :void {
		// 発売期限が残ってる
		if($this->sell_in > 0) {
			$this->calcQuality(-1);
		}
		// 発売期限が残ってない
		else {
			$this->calcQuality(-2);
		}
	}
}
