<?php

declare(strict_types=1);

namespace GildedRose;

class BackstagePassesItem extends BaseItem
{
    public function updateQuality() :void {
        if ($this->quality !== 50){
            if ($this->sell_in > 10) {
                $this->quality = $this->quality + 1;
            } elseif ($this->sell_in > 5) {
                $this->quality = $this->quality + 2;
            } elseif ($this->sell_in > 0) {
                $this->quality = $this->quality + 3;            
            } elseif ($this->sell_in === 0) {
                $this->quality = 0;
            }
        }
        $this->sell_in = $this->sell_in - 1;
    }
}
