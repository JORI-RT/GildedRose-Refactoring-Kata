<?php

declare(strict_types=1);

namespace GildedRose;

class ConjuredItem extends BaseItem
{
    public function updateQuality() :void {
        if ($this->quality >= 2) {
            $this->quality = $this->quality - 2;
        } elseif ($this->quality = 1) {
            $this->quality = $this->quality - 1;
        }
        $this->sell_in = $this->sell_in - 1;
    }
}
