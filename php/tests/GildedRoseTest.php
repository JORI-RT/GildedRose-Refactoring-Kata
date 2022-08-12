<?php

declare(strict_types=1);

namespace Tests;

use ApprovalTests\Approvals;
use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function testNormal(): void
    {
        $items = [new Item('normal', 50, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('normal', $items[0]->name);
        $this->assertSame(49, $items[0]->sell_in);
        $this->assertSame(49, $items[0]->quality);
   
        $items = [new Item('normal', 10, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('normal', $items[0]->name);
        $this->assertSame(9, $items[0]->sell_in);
        $this->assertSame(9, $items[0]->quality);

        $items = [new Item('normal', 5, 5)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('normal', $items[0]->name);
        $this->assertSame(4, $items[0]->sell_in);
        $this->assertSame(4, $items[0]->quality);

        $items = [new Item('normal', 1, 1)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('normal', $items[0]->name);
        $this->assertSame(0, $items[0]->sell_in);
        $this->assertSame(0, $items[0]->quality);

        $items = [new Item('normal', 0, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('normal', $items[0]->name);
        $this->assertSame(-1, $items[0]->sell_in);
        $this->assertSame(0, $items[0]->quality);
    }

    // public function testAgedBrie(): void
    // {
    //     $items = [new Item('Aged Brie', 50, 50)];
    //     $gildedRose = new GildedRose($items);
    //     $gildedRose->updateQuality();
    //     $this->assertSame('Aged Brie', $items[0]->name);
    //     $this->assertSame(49, $items[0]->sell_in);
    //     $this->assertSame(50, $items[0]->quality);

    //     $items = [new Item('Aged Brie', 10, 10)];
    //     $gildedRose = new GildedRose($items);
    //     $gildedRose->updateQuality();
    //     $this->assertSame('Aged Brie', $items[0]->name);
    //     $this->assertSame(9, $items[0]->sell_in);
    //     $this->assertSame(11, $items[0]->quality);

    //     $items = [new Item('Aged Brie', 5, 5)];
    //     $gildedRose = new GildedRose($items);
    //     $gildedRose->updateQuality();
    //     $this->assertSame('Aged Brie', $items[0]->name);
    //     $this->assertSame(4, $items[0]->sell_in);
    //     $this->assertSame(6, $items[0]->quality);

    //     $items = [new Item('Aged Brie', 1, 1)];
    //     $gildedRose = new GildedRose($items);
    //     $gildedRose->updateQuality();
    //     $this->assertSame('Aged Brie', $items[0]->name);
    //     $this->assertSame(0, $items[0]->sell_in);
    //     $this->assertSame(2, $items[0]->quality);

    //     $items = [new Item('Aged Brie', 0, 0)];
    //     $gildedRose = new GildedRose($items);
    //     $gildedRose->updateQuality();
    //     $this->assertSame('Aged Brie', $items[0]->name);
    //     $this->assertSame(-1, $items[0]->sell_in);
    //     $this->assertSame(2, $items[0]->quality); //なぜ2増えるのかは謎
    // }

    // public function testSulfuras(): void
    // {
    //     $items = [new Item('Sulfuras, Hand of Ragnaros', 50, 50)];
    //     $gildedRose = new GildedRose($items);
    //     $gildedRose->updateQuality();
    //     $this->assertSame('Sulfuras, Hand of Ragnaros', $items[0]->name);
    //     $this->assertSame(50, $items[0]->sell_in);
    //     $this->assertSame(50, $items[0]->quality);

    //     $items = [new Item('Sulfuras, Hand of Ragnaros', 10, 10)];
    //     $gildedRose = new GildedRose($items);
    //     $gildedRose->updateQuality();
    //     $this->assertSame('Sulfuras, Hand of Ragnaros', $items[0]->name);
    //     $this->assertSame(10, $items[0]->sell_in);
    //     $this->assertSame(10, $items[0]->quality);

    //     $items = [new Item('Sulfuras, Hand of Ragnaros', 5, 5)];
    //     $gildedRose = new GildedRose($items);
    //     $gildedRose->updateQuality();
    //     $this->assertSame('Sulfuras, Hand of Ragnaros', $items[0]->name);
    //     $this->assertSame(5, $items[0]->sell_in);
    //     $this->assertSame(5, $items[0]->quality);

    //     $items = [new Item('Sulfuras, Hand of Ragnaros', 1, 1)];
    //     $gildedRose = new GildedRose($items);
    //     $gildedRose->updateQuality();
    //     $this->assertSame('Sulfuras, Hand of Ragnaros', $items[0]->name);
    //     $this->assertSame(1, $items[0]->sell_in);
    //     $this->assertSame(1, $items[0]->quality);

    //     $items = [new Item('Sulfuras, Hand of Ragnaros', 0, 0)];
    //     $gildedRose = new GildedRose($items);
    //     $gildedRose->updateQuality();
    //     $this->assertSame('Sulfuras, Hand of Ragnaros', $items[0]->name);
    //     $this->assertSame(0, $items[0]->sell_in);
    //     $this->assertSame(0, $items[0]->quality);
    // }

    // public function testBackstagePasses(): void
    // {
    //     $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 50, 50)];
    //     $gildedRose = new GildedRose($items);
    //     $gildedRose->updateQuality();
    //     $this->assertSame('Backstage passes to a TAFKAL80ETC concert', $items[0]->name);
    //     $this->assertSame(49, $items[0]->sell_in);
    //     $this->assertSame(50, $items[0]->quality);

    //     $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 10, 10)];
    //     $gildedRose = new GildedRose($items);
    //     $gildedRose->updateQuality();
    //     $this->assertSame('Backstage passes to a TAFKAL80ETC concert', $items[0]->name);
    //     $this->assertSame(9, $items[0]->sell_in);
    //     $this->assertSame(12, $items[0]->quality);

    //     $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 5, 5)];
    //     $gildedRose = new GildedRose($items);
    //     $gildedRose->updateQuality();
    //     $this->assertSame('Backstage passes to a TAFKAL80ETC concert', $items[0]->name);
    //     $this->assertSame(4, $items[0]->sell_in);
    //     $this->assertSame(8, $items[0]->quality);

    //     $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 1, 1)];
    //     $gildedRose = new GildedRose($items);
    //     $gildedRose->updateQuality();
    //     $this->assertSame('Backstage passes to a TAFKAL80ETC concert', $items[0]->name);
    //     $this->assertSame(0, $items[0]->sell_in);
    //     $this->assertSame(4, $items[0]->quality);

    //     $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 0, 0)];
    //     $gildedRose = new GildedRose($items);
    //     $gildedRose->updateQuality();
    //     $this->assertSame('Backstage passes to a TAFKAL80ETC concert', $items[0]->name);
    //     $this->assertSame(-1, $items[0]->sell_in);
    //     $this->assertSame(0, $items[0]->quality);
    // }

    // public function testApproveArray()
    // {
    //     $list = ['zero', 'oxe', 'two', 'three', 'four', 'five'];
    //     Approvals::approveList($list);
    // }

    // public function testApproveMap()
    // {
    //     $list = [
    //         'zero' => 'Lance',
    //         'one' => 'Jam',
    //         'two' => 'James',
    //         'three' => 'LLewellyn',
    //         'four' => 'Asaph',
    //         'five' => 'Dana'
    //     ];
    //     Approvals::approveList($list);
    // }

    // public function testApproveString()
    // {
    //     $fudge = 'fadge';
    //     Approvals::approveString($fudge);

    // }
}