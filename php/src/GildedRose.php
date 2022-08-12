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
            if ($item->name === 'Aged Brie'){
                $this->AgedBrie($item);
            } elseif ($item->name === 'Sulfuras, Hand of Ragnaros'){
                $this->Sulfuras($item);
            } elseif ($item->name === 'Backstage passes to a TAFKAL80ETC concert'){
                $this->BackstagePasses($item);
            } elseif ($item->name === 'Conjured'){
                $this->Conjured($item);
           } else {
                $this->normal($item);
            }
        }
    }

    private function AgedBrie($item): void
    {
        if ($item->quality < 50) {
            $item->quality = $item->quality + 1;
        }
        $item->sell_in = $item->sell_in - 1;
    }

    private function Sulfuras($item): void
    {
    }

    private function BackstagePasses($item): void
    {
        if ($item->quality !== 50){
            if ($item->sell_in > 10) {
                $item->quality = $item->quality + 1;
            } elseif ($item->sell_in > 5) {
                $item->quality = $item->quality + 2;
            } elseif ($item->sell_in > 0) {
                $item->quality = $item->quality + 3;            
            } elseif ($item->sell_in === 0) {
                $item->quality = 0;
            }
        }
        $item->sell_in = $item->sell_in - 1;
    }

    private function Conjured($item): void
    {
        if ($item->quality >= 2) {
            $item->quality = $item->quality - 2;
        } elseif ($item->quality = 1) {
            $item->quality = $item->quality - 1;
        }
        $item->sell_in = $item->sell_in - 1;
    }

    private function normal($item): void
    {
        if ($item->sell_in !== 0) {
            $item->quality = $item->quality - 1;
        }
        $item->sell_in = $item->sell_in - 1;
    }
    
}
