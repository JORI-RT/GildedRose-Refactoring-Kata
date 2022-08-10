<?php

declare(strict_types=1);

namespace GildedRose\Item;

class Sulfuras extends BaseItem
{
	/**
	 * Sulfuras の品質を更新する
	 * ●要件
	 *   Quality値は80であり、Quality値が変わることはありません。
	 */
	public function updateQuality() :void {
		$this->quality = 80;
	}
	
	/**
	 * Sulfuras は販売期限が存在しないので、インクリメントしない
	 */
	public function incrementSellIn() :void {
		// do nothing
	}
}
