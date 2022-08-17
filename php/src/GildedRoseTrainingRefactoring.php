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
            if ($item->name == 'Sulfuras, Hand of Ragnaros') {
                if ($item->quality < 50) {
                    $item->quality = $item->quality + 1;
                }
            } else {
                if ($item->sell_in < 0) {
                    switch ($item->name) {
                        case 'Aged Brie':
                            if ($item->quality < 50) {
                                $item->quality = $item->quality + 1;
                            }
                            break;
                        case 'Backstage passes to a TAFKAL80ETC concert':
                            $item->quality = $item->quality - $item->quality;
                            break;
                        default:
                            if ($item->quality > 0) {
                                $item->quality = $item->quality - 2;
                                if ($item->name == 'Conjured Mana Cake') {
                                    $item->quality = $item->quality - 4;
                                }
                            }
                    }
                } else {
                    $item->sell_in = $item->sell_in - 1;
                    switch ($item->name) {
                        case 'Aged Brie':
                            if ($item->quality < 50) {
                                $item->quality = $item->quality + 1;
                            }
                            break;
                        case 'Backstage passes to a TAFKAL80ETC concert':
                            if ($item->quality < 50) {
                                $item->quality = $item->quality + 1;
                                    if ($item->sell_in < 11) {
                                        $item->quality = $item->quality + 1;
                                    }
                                    if ($item->sell_in < 6) {
                                        $item->quality = $item->quality + 1;
                                    }
                                }
                            break;
                        default:
                            if ($item->quality > 0) {
                                $item->quality = $item->quality - 1;
                                if ($item->name == 'Conjured Mana Cake') {
                                    $item->quality = $item->quality - 1;
                                }
                            }
                            break;
                    }
                }
            }
        }
    }
}
