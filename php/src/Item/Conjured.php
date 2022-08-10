<?php

declare(strict_types=1);

namespace GildedRose\Item;

class Conjured extends BaseItem
{
	/**
	 * Conjured の品質を更新する
	 * ●要件
	 *   通常のアイテムの2倍の速さで品質が劣化します。
	 */
	public function updateQuality() :void {
		// 発売期限が残ってる
		if($this->sell_in > 0) {
			$this->calcQuality(-2);
		}
		// 発売期限が残ってない
		else {
			$this->calcQuality(-4);
		}
	}
}
