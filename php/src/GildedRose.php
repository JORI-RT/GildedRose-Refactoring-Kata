<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    /**
     * @var Item[]
     */
    private $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            if ($item->name == 'Aged Brie') {
                $this->upQuality($item);
            } else if ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
                $this->upQuality($item);
                if ($item->sell_in < 11) {
                    $this->upQuality($item);
                }
                if ($item->sell_in < 6) {
                    $this->upQuality($item);
                }
            } else if ($item->name == 'Sulfuras, Hand of Ragnaros') {
                ;
            } else {
                $this->downQuality($item);
            }

            if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                $this->downSellIn($item);
            }

            if ($item->sell_in < 0) {
                if ($item->name == 'Aged Brie') {
                    $this->upQuality($item);
                } else if ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
                    $this->resetQuality($item);
                } else if ($item->name == 'Sulfuras, Hand of Ragnaros') {
                    ;
                } else {
                     $this->downQuality($item);
                }
            }
        }
    }
    
    private function downSellIn($item)
    {
        $item->sell_in = $item->sell_in - 1;
    }

    private function upQuality($item)
    {
        if ($item->quality < 50) {
            $item->quality = $item->quality + 1;
        }
    }

    private function downQuality($item)
    {
        if ($item->quality > 0) {
            $item->quality = $item->quality - 1;
        }
    }

    private function resetQuality($item)
    {
        $item->quality =0;
    }
}
