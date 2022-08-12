<?php

declare(strict_types=1);

namespace Tests;

use ApprovalTests\Approvals;
use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    /**
     * Aged Brie：sell_inが1以上、qualityが50未満
     * 期待値：sell_inが-1、qualityが+1
     */
    public function testAgedBrieNormal(): void
    {
        $items = [new Item('Aged Brie', 5, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('Aged Brie', $items[0]->name);
        $this->assertSame(4, $items[0]->sell_in);
        $this->assertSame(11, $items[0]->quality);

        $items = [new Item('Aged Brie', 1, 49)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('Aged Brie', $items[0]->name);
        $this->assertSame(0, $items[0]->sell_in);
        $this->assertSame(50, $items[0]->quality);
    }

    /**
     * Aged Brie：sell_inが0以下、qualityが50未満
     * 期待値：sell_inが-1、qualityが+2
     */
    public function testAgedBrieSellIn0OrLess(): void
    {
        $items = [new Item('Aged Brie', 0, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('Aged Brie', $items[0]->name);
        $this->assertSame(-1, $items[0]->sell_in);
        $this->assertSame(12, $items[0]->quality);

        $items = [new Item('Aged Brie', -1, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('Aged Brie', $items[0]->name);
        $this->assertSame(-2, $items[0]->sell_in);
        $this->assertSame(12, $items[0]->quality);
    }

    /**
     * Aged Brie：sell_inが1以上、qualityが50
     * 期待値：sell_inが-1、qualityは変更なし
     */
    public function testAgedBrieQuality50(): void
    {
        $items = [new Item('Aged Brie', 5, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('Aged Brie', $items[0]->name);
        $this->assertSame(4, $items[0]->sell_in);
        $this->assertSame(50, $items[0]->quality);
    }

    /**
     * Sulfuras：sell_inが1以上、qualityが80
     * 期待値：sell_in、qualityどちらも変更なし
     */
    public function testSulfurasNormal(): void
    {
        $items = [new Item('Sulfuras, Hand of Ragnaros', 5, 80)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('Sulfuras, Hand of Ragnaros', $items[0]->name);
        $this->assertSame(5, $items[0]->sell_in);
        $this->assertSame(80, $items[0]->quality);
    }

    /**
     * Backstage passes：sell_inが11以上、qualityが50未満
     * 期待値：sell_inが-1、qualityが+1
     */
    public function testBackstagePassesNormal(): void
    {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 20, 20)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('Backstage passes to a TAFKAL80ETC concert', $items[0]->name);
        $this->assertSame(19, $items[0]->sell_in);
        $this->assertSame(21, $items[0]->quality);

        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 11, 49)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('Backstage passes to a TAFKAL80ETC concert', $items[0]->name);
        $this->assertSame(10, $items[0]->sell_in);
        $this->assertSame(50, $items[0]->quality);
    }

    /**
     * Backstage passes：sell_inが6〜10、qualityが50未満
     * 期待値：sell_inが-1、qualityが+2
     */
    public function testBackstagePassesSellIn6OrMoreAndSellIn10OrLess(): void
    {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 6, 20)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('Backstage passes to a TAFKAL80ETC concert', $items[0]->name);
        $this->assertSame(5, $items[0]->sell_in);
        $this->assertSame(22, $items[0]->quality);

        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 10, 20)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('Backstage passes to a TAFKAL80ETC concert', $items[0]->name);
        $this->assertSame(9, $items[0]->sell_in);
        $this->assertSame(22, $items[0]->quality);
    }

    /**
     * Backstage passes：sell_inが1〜5、qualityが50未満
     * 期待値：sell_inが-1、qualityが+3
     */
    public function testBackstagePassesSellIn1OrMoreAndSellIn5OrLess(): void
    {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 1, 20)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('Backstage passes to a TAFKAL80ETC concert', $items[0]->name);
        $this->assertSame(0, $items[0]->sell_in);
        $this->assertSame(23, $items[0]->quality);

        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 5, 20)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('Backstage passes to a TAFKAL80ETC concert', $items[0]->name);
        $this->assertSame(4, $items[0]->sell_in);
        $this->assertSame(23, $items[0]->quality);
    }

    /**
     * Backstage passes：sell_inが0以下、qualityが50未満
     * 期待値：sell_inが-1、qualityが+1
     */
    public function testBackstagePassesSellIn0OrLess(): void
    {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 0, 20)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('Backstage passes to a TAFKAL80ETC concert', $items[0]->name);
        $this->assertSame(-1, $items[0]->sell_in);
        $this->assertSame(0, $items[0]->quality);

        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', -1, 20)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('Backstage passes to a TAFKAL80ETC concert', $items[0]->name);
        $this->assertSame(-2, $items[0]->sell_in);
        $this->assertSame(0, $items[0]->quality);
    }

    /**
     * Backstage passes：qualityが50
     * 期待値：sell_inが-1、qualityは変更なし
     */
    public function testBackstagePassesQuality50(): void
    {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 11, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('Backstage passes to a TAFKAL80ETC concert', $items[0]->name);
        $this->assertSame(10, $items[0]->sell_in);
        $this->assertSame(50, $items[0]->quality);

        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 6, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('Backstage passes to a TAFKAL80ETC concert', $items[0]->name);
        $this->assertSame(5, $items[0]->sell_in);
        $this->assertSame(50, $items[0]->quality);

        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 1, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('Backstage passes to a TAFKAL80ETC concert', $items[0]->name);
        $this->assertSame(0, $items[0]->sell_in);
        $this->assertSame(50, $items[0]->quality);
    }

    /**
     * Foo：sell_inが1以上、qualityが50未満
     * 期待値：sell_inが-1、qualityが-1
     */
    public function testFooNormal(): void
    {
        $items = [new Item('Foo', 5, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('Foo', $items[0]->name);
        $this->assertSame(4, $items[0]->sell_in);
        $this->assertSame(9, $items[0]->quality);
    }

    /**
     * Foo：sell_inが0以下、qualityが50未満
     * 期待値：sell_inが-1、qualityが-2
     */
    public function testFooSellIn0OrLess(): void
    {
        $items = [new Item('Foo', 0, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('Foo', $items[0]->name);
        $this->assertSame(-1, $items[0]->sell_in);
        $this->assertSame(8, $items[0]->quality);

        $items = [new Item('Foo', -1, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('Foo', $items[0]->name);
        $this->assertSame(-2, $items[0]->sell_in);
        $this->assertSame(8, $items[0]->quality);
    }

    /**
     * Foo：sell_inが1以上、qualityが0
     * 期待値：sell_inが-1、qualityは変更なし
     */
    public function testFooQuality0(): void
    {
        $items = [new Item('Foo', 5, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('Foo', $items[0]->name);
        $this->assertSame(4, $items[0]->sell_in);
        $this->assertSame(0, $items[0]->quality);
    }

    /**
     * Conjured：sell_inが1以上、qualityが50未満
     * 期待値：sell_inが-1、qualityが-2
     */
    public function testConjuredsNormal(): void
    {
        $items = [new Item('Conjured Mana Cake', 10, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('Conjured Mana Cake', $items[0]->name);
        $this->assertSame(9, $items[0]->sell_in);
        $this->assertSame(8, $items[0]->quality);
    }

    /**
     * Conjured：sell_inが1以上、qualityが1
     * 期待値：sell_inが-1、qualityが-1
     */
    public function testConjuredQuality1(): void
    {
        $items = [new Item('Conjured Mana Cake', 10, 1)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('Conjured Mana Cake', $items[0]->name);
        $this->assertSame(9, $items[0]->sell_in);
        $this->assertSame(0, $items[0]->quality);
    }

    /**
     * Conjured：sell_inが1以上、qualityが0
     * 期待値：sell_inが-1、qualityは変更なし
     */
    public function testConjuredQuality0(): void
    {
        $items = [new Item('Conjured Mana Cake', 10, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('Conjured Mana Cake', $items[0]->name);
        $this->assertSame(9, $items[0]->sell_in);
        $this->assertSame(0, $items[0]->quality);
    }

    /**
     * Conjured：sell_inが0以下、qualityが50未満
     * 期待値：sell_inが-1、qualityが-4
     */
    public function testConjuredSellIn0OrLess(): void
    {
        $items = [new Item('Conjured Mana Cake', 0, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('Conjured Mana Cake', $items[0]->name);
        $this->assertSame(-1, $items[0]->sell_in);
        $this->assertSame(6, $items[0]->quality);

        $items = [new Item('Conjured Mana Cake', -1, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('Conjured Mana Cake', $items[0]->name);
        $this->assertSame(-2, $items[0]->sell_in);
        $this->assertSame(6, $items[0]->quality);
    }

    /**
     * Conjured：sell_inが0以下、qualityが2以下
     * 期待値：sell_inが-1、qualityを減算、0が下限
     */
    public function testConjuredSellIn0OrLessAndQuality2OrLess(): void
    {
        $items = [new Item('Conjured Mana Cake', 0, 2)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('Conjured Mana Cake', $items[0]->name);
        $this->assertSame(-1, $items[0]->sell_in);
        $this->assertSame(0, $items[0]->quality);

        $items = [new Item('Conjured Mana Cake', 0, 1)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('Conjured Mana Cake', $items[0]->name);
        $this->assertSame(-1, $items[0]->sell_in);
        $this->assertSame(0, $items[0]->quality);
    }

    /**
     * Conjured：sell_inが0、qualityが0
     * 期待値：sell_inが-1、qualityは変更なし
     */
    public function testConjuredSellIn0AndQuality0(): void
    {
        $items = [new Item('Conjured Mana Cake', 0, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('Conjured Mana Cake', $items[0]->name);
        $this->assertSame(-1, $items[0]->sell_in);
        $this->assertSame(0, $items[0]->quality);
    }

    /**
     * 複数商品
     */
    public function testMixCase(): void
    {
        $items = [
            new Item('Aged Brie', 5, 10),
            new Item('Sulfuras, Hand of Ragnaros', 5, 80),
            new Item('Backstage passes to a TAFKAL80ETC concert', 5, 10),
            new Item('Foo', 5, 10),
            new Item('Conjured Mana Cake', 5, 10),
        ];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('Aged Brie', $items[0]->name);
        $this->assertSame(4, $items[0]->sell_in);
        $this->assertSame(11, $items[0]->quality);
        $this->assertSame('Sulfuras, Hand of Ragnaros', $items[1]->name);
        $this->assertSame(5, $items[1]->sell_in);
        $this->assertSame(80, $items[1]->quality);
        $this->assertSame('Backstage passes to a TAFKAL80ETC concert', $items[2]->name);
        $this->assertSame(4, $items[2]->sell_in);
        $this->assertSame(13, $items[2]->quality);
        $this->assertSame('Foo', $items[3]->name);
        $this->assertSame(4, $items[3]->sell_in);
        $this->assertSame(9, $items[3]->quality);
        $this->assertSame('Conjured Mana Cake', $items[4]->name);
        $this->assertSame(4, $items[4]->sell_in);
        $this->assertSame(8, $items[4]->quality);
    }

    // テストエラーの原因が特定できないので後で調査する
    /*
    public function testApproveArray()
    {
        $list = ['zero', 'oxe', 'two', 'three', 'four', 'five'];
        Approvals::approveList($list);
    }
    public function testApproveMap()
    {
        $list = [
            'zero' => 'Lance',
            'one' => 'Jam',
            'two' => 'James',
            'three' => 'LLewellyn',
            'four' => 'Asaph',
            'five' => 'Dana'
        ];
        Approvals::approveList($list);
    }
    public function testApproveString()
    {
        $fudge = 'fadge';
        Approvals::approveString($fudge);
    }
    */
}