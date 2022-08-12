<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    /**
     * @var Item[]
     */
    private $items;

    private $item;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            $this->item = $item;
            if ($this->item->name === 'Aged Brie') {
                // 商品：Aged Brieの処理
                $this->agedBrie();
            } elseif ($this->item->name === 'Sulfuras, Hand of Ragnaros') {
                // 商品：Sulfurasは何もしない
            } elseif ($this->item->name === 'Backstage passes to a TAFKAL80ETC concert') {
                // 商品：Backstage passesの処理
                $this->backstagePasses();
            } else {
                if ($item->name != 'Aged Brie' and $item->name != 'Backstage passes to a TAFKAL80ETC concert') {
                    if ($item->quality > 0) {
                        if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                            $item->quality = $item->quality - 1;
                        }
                    }
                } else {
                    if ($item->quality < 50) {
                        $item->quality = $item->quality + 1;
                        if ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
                            if ($item->sell_in < 11) {
                                if ($item->quality < 50) {
                                    $item->quality = $item->quality + 1;
                                }
                            }
                            if ($item->sell_in < 6) {
                                if ($item->quality < 50) {
                                    $item->quality = $item->quality + 1;
                                }
                            }
                        }
                    }
                }

                if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                    $item->sell_in = $item->sell_in - 1;
                }

                if ($item->sell_in < 0) {
                    if ($item->name != 'Aged Brie') {
                        if ($item->name != 'Backstage passes to a TAFKAL80ETC concert') {
                            if ($item->quality > 0) {
                                if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                                    $item->quality = $item->quality - 1;
                                }
                            }
                        } else {
                            $item->quality = $item->quality - $item->quality;
                        }
                    } else {
                        if ($item->quality < 50) {
                            $item->quality = $item->quality + 1;
                        }
                    }
                }
            }
        }
    }

    /**
     * 商品：Aged Brie計算処理
     */
    private function agedBrie(): void
    {
        $this->calcSellInSubtraction();
        $this->calcQualityAddition();

        // sell_inが0未満の場合、qualityを再加算する
        if ($this->item->sell_in < 0) {
            $this->calcQualityAddition();
        }
    }

    /**
     * 商品：Backstage passes計算処理
     */
    private function backstagePasses(): void
    {
        $this->calcSellInSubtraction();
        $this->calcQualityAddition();

        // sell_inが10未満の場合、qualityを再加算する
        if ($this->item->sell_in < 10) {
            $this->calcQualityAddition();
        }
        // sell_inが5未満の場合、qualityを再加算する
        if ($this->item->sell_in < 5) {
            $this->calcQualityAddition();
        }
        // sell_inが0未満の場合、qualityを0する
        if ($this->item->sell_in < 0) {
            $this->item->quality = 0;
        }
    }

    /**
     * sell_inの減算を行う
     */
    private function calcSellInSubtraction(): void
    {
        --$this->item->sell_in;
    }

    /**
     * qualityの加算を行う
     */
    private function calcQualityAddition(): void
    {
        // 50未満の場合計算
        if ($this->item->quality < 50) {
            ++$this->item->quality;
        }
    }
}
