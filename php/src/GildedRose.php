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
            } else {
                $this->normal($item);
            }

            // if ($item->name != 'Aged Brie' and $item->name != 'Backstage passes to a TAFKAL80ETC concert') {
            //     if ($item->quality > 0) {
            //         if ($item->name != 'Sulfuras, Hand of Ragnaros') {
            //             $item->quality = $item->quality - 1;
            //         }
            //     }
            // } else {
            //     if ($item->quality < 50) {
            //         $item->quality = $item->quality + 1;
            //         if ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
            //             if ($item->sell_in < 11) {
            //                 if ($item->quality < 50) {
            //                     $item->quality = $item->quality + 1;
            //                 }
            //             }
            //             if ($item->sell_in < 6) {
            //                 if ($item->quality < 50) {
            //                     $item->quality = $item->quality + 1;
            //                 }
            //             }
            //         }
            //     }
            // }

            // if ($item->name != 'Sulfuras, Hand of Ragnaros') {
            //     $item->sell_in = $item->sell_in - 1;
            // }

            // if ($item->sell_in < 0) {
            //     if ($item->name != 'Aged Brie') {
            //         if ($item->name != 'Backstage passes to a TAFKAL80ETC concert') {
            //             if ($item->quality > 0) {
            //                 if ($item->name != 'Sulfuras, Hand of Ragnaros') {
            //                     $item->quality = $item->quality - 1;
            //                 }
            //             }
            //         } else {
            //             $item->quality = $item->quality - $item->quality;
            //         }
            //     } else {
            //         if ($item->quality < 50) {
            //             $item->quality = $item->quality + 1;
            //         }
            //     }
            // }
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

    private function normal($item): void
    {
        if ($item->sell_in !== 0) {
            $item->quality = $item->quality - 1;
        }
        $item->sell_in = $item->sell_in - 1;
    }
    
}
