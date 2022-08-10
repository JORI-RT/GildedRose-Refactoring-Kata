<?php

declare(strict_types=1);

namespace GildedRose\Item;

class BackstagePasses extends BaseItem
{

	/**
	 * BackstagePasses の品質を更新する
	 * ●要件
	 *   SellIn値が近づくにつれてQuality値が上昇
	 *   10日以内になると毎日2上がり
	 *   5日以内になると毎日3上がります
	 *   コンサート終了後には0になります。
	 */
	public function updateQuality() :void {
		// 発売期限が残ってる
		if($this->sell_in > 0) {
			if($this->sell_in <= 5) {
				$this->calcQuality(3);
			}
			else if($this->sell_in <= 10) {
				$this->calcQuality(2);
			}
			else {
				$this->calcQuality(1);
			}
		}
		// 発売期限が残ってない
		else {
			$this->quality = 0;
		}
	}

}
