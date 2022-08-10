<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    /**
     * @var Item[]
     */
    public $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

	public function updateQuality($days): void
	{
		if (is_int($days) === false || $days <= 0) {
    		return;		// do nothing
    	}
    	
		foreach ($this->items as $item) {
			switch ($item->name){
			case 'Aged Brie':
  				// 処理
  				$this->updateQualityAgedBrie($item, $days);
  				break;
			case 'Sulfuras':				// サルフラス
  				// 処理
  				$this->updateQualitySulfuras($item, $days);
  				break;
			case 'Backstage passes':
  				// 処理
  				$this->updateQualityBackstagePasses($item, $days);
  				break;
			case 'Conjured':				// カンジャド
  				// 処理
				$this->updateQualityConjured($item, $days);
				break;
			default:
				// 処理
				$this->updateQualityNormal($item, $days);
			}
		}
	}

	/**
	 * 通常アイテムの品質を更新する
	 * ●要件
	 *   販売するための残り日数が無くなると、Quality値は2小さくなります。
	 *  Quality値は決してマイナスにはなりません。
	 *  Quality値は50以上にはなりません。
	 */
	private function updateQualityNormal($item, $days) {
		for ($i = 0; $i < $days; $i++) {
			// 発売期限が残ってる
			if($item->sell_in > 0) {
				$this->calcQuality($item, -1);
			}
			// 発売期限が残ってない
			else {
				$this->calcQuality($item, -2);
			}
			$item->sell_in--;
		}
	}
	
	/**
	 * AgedBrie の品質を更新する
	 * ●要件
	 *   日が経つほどQuality値が上がっていきます。
	 */
	private function updateQualityAgedBrie($item, $days) {
		for ($i = 0; $i < $days; $i++) {
			// 発売期限が残ってる
			if($item->sell_in > 0) {
				$this->calcQuality($item, 1);
			}
			// 発売期限が残ってない
			else {
				$this->calcQuality($item, 2);
			}
			$item->sell_in--;
		}
	}

	/**
	 * BackstagePasses の品質を更新する
	 * ●要件
	 *   SellIn値が近づくにつれてQuality値が上昇
	 *   10日以内になると毎日2上がり
	 *   5日以内になると毎日3上がります
	 *   コンサート終了後には0になります。
	 */
	private function updateQualityBackstagePasses($item, $days) {
		for ($i = 0; $i < $days; $i++) {
			// 発売期限が残ってる
			if($item->sell_in > 0) {
				if($item->sell_in <= 5) {
					$this->calcQuality($item, 3);
				}
				else if($item->sell_in <= 10) {
					$this->calcQuality($item, 2);
				}
				else {
					$this->calcQuality($item, 1);
				}
			}
			// 発売期限が残ってない
			else {
				$item->quality = 0;
			}
			$item->sell_in--;
		}
	}

	/**
	 * Sulfuras の品質を更新する
	 * ●要件
	 *   Quality値は80であり、Quality値が変わることはありません。
	 */
	private function updateQualitySulfuras($item, $days) {
		$item->quality = 80;
	}

	/**
	 * Conjured の品質を更新する
	 * ●要件
	 *   通常のアイテムの2倍の速さで品質が劣化します。
	 */
	private function updateQualityConjured($item, $days) {
		for ($i = 0; $i < $days; $i++) {
			// 発売期限が残ってる
			if($item->sell_in > 0) {
				$this->calcQuality($item, -2);
			}
			// 発売期限が残ってない
			else {
				$this->calcQuality($item, -4);
			}
			$item->sell_in--;
		}
	}
	
	private function calcQuality($item, $quality) {
		$item->quality += $quality;
		if($item->quality < 0) {
			$item->quality = 0;
		} else if($item->quality > 50) {
			$item->quality = 50;
		}
	}
}
