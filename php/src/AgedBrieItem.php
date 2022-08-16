<?php

declare(strict_types=1);

namespace GildedRose;

class AgedBrieItem extends BaseItem
{
    public function updateQuality() :void {
        if ($this->quality < 50) {
            $this->quality = $this->quality + 1;
        }
        $this->sell_in = $this->sell_in - 1;
    }
}
