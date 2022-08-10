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
 
            if ($item->getName() == 'Sulfuras, Hand of Ragnaros') {
                continue;
            }
            
            $item->downSellIn();

            if ($item->getName() == 'Aged Brie') {
                $item->upQuality();
                if ($item->getSellIn() < 0) {
                    $item->upQuality();
                }
            } else if ($item->getName() == 'Backstage passes to a TAFKAL80ETC concert') {
                $item->upQuality();
                if ($item->getSellIn() < 10) {
                    $item->upQuality();
                }
                if ($item->getSellIn() < 5) {
                    $item->upQuality();
                }
                if ($item->getSellIn() < 0) {
                    $item->resetQuality();
                }
            } else {
                $item->downQuality();
                if ($item->getSellIn() < 0) {
                    $item->downQuality();
                }
            }
        }
    }
}
