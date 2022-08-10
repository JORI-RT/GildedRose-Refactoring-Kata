<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
	private function initGildedRose() {
		$items = [
			new Item('+5 Dexterity Vest', 10, 20),			// normal item
			new Item('Aged Brie', 2, 0),
			new Item('Elixir of the Mongoose', 5, 7),		// normal
			new Item('Sulfuras', 0, 80),
			new Item('Sulfuras', -1, 80),
			new Item('Backstage passes', 15, 20),
			new Item('Backstage passes', 10, 49),
			new Item('Backstage passes', 5, 49),
			new Item('Conjured', 3, 6),
		];
		return new GildedRose($items);
	}

	private function assertItem($item, $expName, $expSell_in, $expQuality) {
		$this->assertSame($expName, $item->name, "check name. item->name = $item->name, exp = $expName");
		$this->assertSame($expSell_in, $item->sell_in, "check sell_in. name = $expName, item->sell_in = $item->sell_in, exp = $expSell_in");
		$this->assertSame($expQuality, $item->quality, "check quality. name = $expName, item->quality = $item->quality, exp = $expQuality");
	}
	public function testDay1(): void
	{
		$days = 1;
		$gildedRose = $this->initGildedRose();
		$gildedRose->updateQuality($days);

		$this->assertItem($gildedRose->items[0], '+5 Dexterity Vest', 9, 19);
		$this->assertItem($gildedRose->items[1], 'Aged Brie', 1, 1);
		$this->assertItem($gildedRose->items[2], 'Elixir of the Mongoose', 4, 6);
		$this->assertItem($gildedRose->items[3], 'Sulfuras', 0, 80);
		$this->assertItem($gildedRose->items[4], 'Sulfuras', -1, 80);
		$this->assertItem($gildedRose->items[5], 'Backstage passes', 14, 21);
		$this->assertItem($gildedRose->items[6], 'Backstage passes', 9, 50);
		$this->assertItem($gildedRose->items[7], 'Backstage passes', 4, 50);
		//$this->assertItem($gildedRose->items[8], 'Conjured', 2, 5);
    }
	public function testDay2(): void
	{
		$days = 2;
		$gildedRose = $this->initGildedRose();
		$gildedRose->updateQuality($days);

		$this->assertItem($gildedRose->items[0], '+5 Dexterity Vest', 8, 18);
		$this->assertItem($gildedRose->items[1], 'Aged Brie', 0, 2);
		$this->assertItem($gildedRose->items[2], 'Elixir of the Mongoose', 3, 5);
		$this->assertItem($gildedRose->items[3], 'Sulfuras', 0, 80);
		$this->assertItem($gildedRose->items[4], 'Sulfuras', -1, 80);
		$this->assertItem($gildedRose->items[5], 'Backstage passes', 13, 22);
		$this->assertItem($gildedRose->items[6], 'Backstage passes', 8, 50);
		$this->assertItem($gildedRose->items[7], 'Backstage passes', 3, 50);
		//$this->assertItem($gildedRose->items[8], 'Conjured', 1, 4);
    }
	public function testDay3(): void
	{
		$days = 3;
		$gildedRose = $this->initGildedRose();
		$gildedRose->updateQuality($days);

		$this->assertItem($gildedRose->items[0], '+5 Dexterity Vest', 7, 17);
		$this->assertItem($gildedRose->items[1], 'Aged Brie', -1, 4);
		$this->assertItem($gildedRose->items[2], 'Elixir of the Mongoose', 2, 4);
		$this->assertItem($gildedRose->items[3], 'Sulfuras', 0, 80);
		$this->assertItem($gildedRose->items[4], 'Sulfuras', -1, 80);
		$this->assertItem($gildedRose->items[5], 'Backstage passes', 12, 23);
		$this->assertItem($gildedRose->items[6], 'Backstage passes', 7, 50);
		$this->assertItem($gildedRose->items[7], 'Backstage passes', 2, 50);
		//$this->assertItem($gildedRose->items[8], 'Conjured', 0, 3);
    }
	public function testDay4(): void
	{
		$days = 4;
		$gildedRose = $this->initGildedRose();
		$gildedRose->updateQuality($days);

		$this->assertItem($gildedRose->items[0], '+5 Dexterity Vest', 6, 16);
		$this->assertItem($gildedRose->items[1], 'Aged Brie', -2, 6);
		$this->assertItem($gildedRose->items[2], 'Elixir of the Mongoose', 1, 3);
		$this->assertItem($gildedRose->items[3], 'Sulfuras', 0, 80);
		$this->assertItem($gildedRose->items[4], 'Sulfuras', -1, 80);
		$this->assertItem($gildedRose->items[5], 'Backstage passes', 11, 24);
		$this->assertItem($gildedRose->items[6], 'Backstage passes', 6, 50);
		$this->assertItem($gildedRose->items[7], 'Backstage passes', 1, 50);
		//$this->assertItem($gildedRose->items[8], 'Conjured', -1, 1);
	}
    
	public function testDay20(): void
	{
		$days = 20;
		$gildedRose = $this->initGildedRose();
		$gildedRose->updateQuality($days);

		$this->assertItem($gildedRose->items[0], '+5 Dexterity Vest', -10, 0);
		$this->assertItem($gildedRose->items[1], 'Aged Brie', -18, 38);
		$this->assertItem($gildedRose->items[2], 'Elixir of the Mongoose', -15, 0);
		$this->assertItem($gildedRose->items[3], 'Sulfuras', 0, 80);
		$this->assertItem($gildedRose->items[4], 'Sulfuras', -1, 80);
		$this->assertItem($gildedRose->items[5], 'Backstage passes', -5, 0);
		$this->assertItem($gildedRose->items[6], 'Backstage passes', -10, 0);
		$this->assertItem($gildedRose->items[7], 'Backstage passes', -15, 0);
		//$this->assertItem($gildedRose->items[8], 'Conjured', -17, 0);
    }
    
	public function testDay30(): void
	{
		$days = 30;
		$gildedRose = $this->initGildedRose();
		$gildedRose->updateQuality($days);

		$this->assertItem($gildedRose->items[0], '+5 Dexterity Vest', -20, 0);
		$this->assertItem($gildedRose->items[1], 'Aged Brie', -28, 50);
		$this->assertItem($gildedRose->items[2], 'Elixir of the Mongoose', -25, 0);
		$this->assertItem($gildedRose->items[3], 'Sulfuras', 0, 80);
		$this->assertItem($gildedRose->items[4], 'Sulfuras', -1, 80);
		$this->assertItem($gildedRose->items[5], 'Backstage passes', -15, 0);
		$this->assertItem($gildedRose->items[6], 'Backstage passes', -20, 0);
		$this->assertItem($gildedRose->items[7], 'Backstage passes', -25, 0);
		//$this->assertItem($gildedRose->items[8], 'Conjured', -27, 0);
    }
}
