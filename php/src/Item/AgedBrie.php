<?php

declare(strict_types=1);

namespace GildedRose\Item;

class AgedBrie extends BaseItem
{
	/**
	 * AgedBrie の品質を更新する
	 * ●要件
	 *   日が経つほどQuality値が上がっていきます。
	 */
	public function updateQuality() :void {
		// 発売期限が残ってる
		if($this->sell_in > 0) {
			$this->calcQuality(1);
		}
		// 発売期限が残ってない
		else {
			$this->calcQuality(2);
		}
	}

}
