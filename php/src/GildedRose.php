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
        foreach ($this->items as $this->item) {
            if ($this->item->name === 'Aged Brie') {
                // 商品：Aged Brieの処理
                $this->agedBrie();
            } elseif ($this->item->name === 'Sulfuras, Hand of Ragnaros') {
                // 商品：Sulfurasは何もしない
            } elseif ($this->item->name === 'Backstage passes to a TAFKAL80ETC concert') {
                // 商品：Backstage passesの処理
                $this->backstagePasses();
            } elseif ($this->item->name === 'Conjured Mana Cake') {
                // 商品：Conjuredの処理
                $this->conjured();
            } else {
                // その他商品の処理
                $this->others();
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
     * 商品：Conjured計算処理
     */
    private function conjured(): void
    {
        $this->calcSellInSubtraction();
        $this->calcQualityDoubleSubtraction();
        
        // sell_inが0未満の場合、sell_inを再減算する
        if ($this->item->sell_in < 0) {
            $this->calcQualityDoubleSubtraction();
        }
    }

    /**
     * その他商品
     */
    private function others(): void
    {
        $this->calcSellInSubtraction();
        $this->calcQualitySubtraction();

        // sell_inが0未満の場合、sell_inを再減算する
        if ($this->item->sell_in < 0) {
            $this->calcQualitySubtraction();
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

    /**
     * qualityの減算を行う
     */
    private function calcQualitySubtraction(): void
    {
        // 1以上の場合計算
        if ($this->item->quality >= 1) {
            --$this->item->quality;
        }
    }

    /**
     * qualityを2倍の減算を行う
     */
    private function calcQualityDoubleSubtraction(): void
    {
        // 1以上の場合計算
        if ($this->item->quality >= 1) {
            $this->item->quality -=2;
        }

        // qualityが0未満の場合、0を設定
        if ($this->item->quality < 0) {
            $this->item->quality = 0;
        }
    }
}
