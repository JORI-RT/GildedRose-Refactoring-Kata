<?php

declare(strict_types=1);

namespace GildedRose;

class NormalItem extends BaseItem
{
    public function updateQuality() :void {
        if ($this->sell_in !== 0) {
            $this->quality = $this->quality - 1;
        }
        $this->sell_in = $this->sell_in - 1;
    }
}
