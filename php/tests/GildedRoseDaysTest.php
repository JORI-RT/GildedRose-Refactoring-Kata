<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseDaysTest extends TestCase
{

    private function createItems(): array
    {
        $items = array();
        $items[] = new Item('+5 Dexterity Vest', 10, 20);
        $items[] = new Item('Aged Brie', 2, 0);
        $items[] = new Item('Elixir of the Mongoose', 5, 7);
        $items[] = new Item('Sulfuras, Hand of Ragnaros', 0, 80);
        $items[] = new Item('Sulfuras, Hand of Ragnaros', -1, 80);
        $items[] = new Item('Backstage passes to a TAFKAL80ETC concert', 15, 20);
        $items[] = new Item('Backstage passes to a TAFKAL80ETC concert', 10, 49);
        $items[] = new Item('Backstage passes to a TAFKAL80ETC concert', 5, 49);
        $items[] = new Item('Conjured Mana Cake', 3, 6);
        return $items;
    }

    public function testDay1(): void
    {
        $items = $this->createItems();
        $gildedRose = new GildedRose($items);
        
        for ($i = 0; $i < 1; $i++) {
            $gildedRose->updateQuality();
        }
        
        $index = -1;
        
        $this->assertSame('+5 Dexterity Vest', $items[++$index]->name);
        $this->assertSame(9, $items[$index]->sell_in);
        $this->assertSame(19, $items[$index]->quality);
        
        $this->assertSame('Aged Brie', $items[++$index]->name);
        $this->assertSame(1, $items[$index]->sell_in);
        $this->assertSame(1, $items[$index]->quality);
        
        $this->assertSame('Elixir of the Mongoose', $items[++$index]->name);
        $this->assertSame(4, $items[$index]->sell_in);
        $this->assertSame(6, $items[$index]->quality);
        
        $this->assertSame('Sulfuras, Hand of Ragnaros', $items[++$index]->name);
        $this->assertSame(0, $items[$index]->sell_in);
        $this->assertSame(80, $items[$index]->quality);
        
        $this->assertSame('Sulfuras, Hand of Ragnaros', $items[++$index]->name);
        $this->assertSame(-1, $items[$index]->sell_in);
        $this->assertSame(80, $items[$index]->quality);
        
        $this->assertSame('Backstage passes to a TAFKAL80ETC concert', $items[++$index]->name);
        $this->assertSame(14, $items[$index]->sell_in);
        $this->assertSame(21, $items[$index]->quality);
        
        $this->assertSame('Backstage passes to a TAFKAL80ETC concert', $items[++$index]->name);
        $this->assertSame(9, $items[$index]->sell_in);
        $this->assertSame(50, $items[$index]->quality);
        
        $this->assertSame('Backstage passes to a TAFKAL80ETC concert', $items[++$index]->name);
        $this->assertSame(4, $items[$index]->sell_in);
        $this->assertSame(50, $items[$index]->quality);
        
//        $this->assertSame('Conjured Mana Cake', $items[++$index]->name);
//        $this->assertSame(2, $items[$index]->sell_in);
//        $this->assertSame(5, $items[$index]->quality);
    }

    public function testDay10(): void
    {
        $items = $this->createItems();
        $gildedRose = new GildedRose($items);
        
        for ($i = 0; $i < 10; $i++) {
            $gildedRose->updateQuality();
        }
        
        $index = -1;
        
        $this->assertSame('+5 Dexterity Vest', $items[++$index]->name);
        $this->assertSame(0, $items[$index]->sell_in);
        $this->assertSame(10, $items[$index]->quality);
        
        $this->assertSame('Aged Brie', $items[++$index]->name);
        $this->assertSame(-8, $items[$index]->sell_in);
        $this->assertSame(18, $items[$index]->quality);
        
        $this->assertSame('Elixir of the Mongoose', $items[++$index]->name);
        $this->assertSame(-5, $items[$index]->sell_in);
        $this->assertSame(0, $items[$index]->quality);
        
        $this->assertSame('Sulfuras, Hand of Ragnaros', $items[++$index]->name);
        $this->assertSame(0, $items[$index]->sell_in);
        $this->assertSame(80, $items[$index]->quality);
        
        $this->assertSame('Sulfuras, Hand of Ragnaros', $items[++$index]->name);
        $this->assertSame(-1, $items[$index]->sell_in);
        $this->assertSame(80, $items[$index]->quality);
        
        $this->assertSame('Backstage passes to a TAFKAL80ETC concert', $items[++$index]->name);
        $this->assertSame(5, $items[$index]->sell_in);
        $this->assertSame(35, $items[$index]->quality);
        
        $this->assertSame('Backstage passes to a TAFKAL80ETC concert', $items[++$index]->name);
        $this->assertSame(0, $items[$index]->sell_in);
        $this->assertSame(50, $items[$index]->quality);
        
        $this->assertSame('Backstage passes to a TAFKAL80ETC concert', $items[++$index]->name);
        $this->assertSame(-5, $items[$index]->sell_in);
        $this->assertSame(0, $items[$index]->quality);
        
//        $this->assertSame('Conjured Mana Cake', $items[++$index]->name);
//        $this->assertSame(-7, $items[$index]->sell_in);
//        $this->assertSame(0, $items[$index]->quality);
    }

    public function testDay20(): void
    {
        $items = $this->createItems();
        $gildedRose = new GildedRose($items);
        
        for ($i = 0; $i < 20; $i++) {
            $gildedRose->updateQuality();
        }
        
        $index = -1;
        
        $this->assertSame('+5 Dexterity Vest', $items[++$index]->name);
        $this->assertSame(-10, $items[$index]->sell_in);
        $this->assertSame(0, $items[$index]->quality);
        
        $this->assertSame('Aged Brie', $items[++$index]->name);
        $this->assertSame(-18, $items[$index]->sell_in);
        $this->assertSame(38, $items[$index]->quality);
        
        $this->assertSame('Elixir of the Mongoose', $items[++$index]->name);
        $this->assertSame(-15, $items[$index]->sell_in);
        $this->assertSame(0, $items[$index]->quality);
        
        $this->assertSame('Sulfuras, Hand of Ragnaros', $items[++$index]->name);
        $this->assertSame(0, $items[$index]->sell_in);
        $this->assertSame(80, $items[$index]->quality);
        
        $this->assertSame('Sulfuras, Hand of Ragnaros', $items[++$index]->name);
        $this->assertSame(-1, $items[$index]->sell_in);
        $this->assertSame(80, $items[$index]->quality);
        
        $this->assertSame('Backstage passes to a TAFKAL80ETC concert', $items[++$index]->name);
        $this->assertSame(-5, $items[$index]->sell_in);
        $this->assertSame(0, $items[$index]->quality);
        
        $this->assertSame('Backstage passes to a TAFKAL80ETC concert', $items[++$index]->name);
        $this->assertSame(-10, $items[$index]->sell_in);
        $this->assertSame(0, $items[$index]->quality);
        
        $this->assertSame('Backstage passes to a TAFKAL80ETC concert', $items[++$index]->name);
        $this->assertSame(-15, $items[$index]->sell_in);
        $this->assertSame(0, $items[$index]->quality);
        
//        $this->assertSame('Conjured Mana Cake', $items[++$index]->name);
//        $this->assertSame(-17, $items[$index]->sell_in);
//        $this->assertSame(0, $items[$index]->quality);
    }

}
