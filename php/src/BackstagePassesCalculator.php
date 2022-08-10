<?php

declare(strict_types=1);

namespace GildedRose;

class BackstagePassesCalculator extends BaseCalculator
{
    
    public function calculateQuality(int $sell_in, int $quality): int
    {
        $calculatedQuality = $this->upQuality($quality);
        if ($sell_in < 10) {
            $calculatedQuality = $this->upQuality($calculatedQuality);
        }
        if ($sell_in < 5) {
            $calculatedQuality = $this->upQuality($calculatedQuality);
        }
        if ($sell_in < 0) {
            $calculatedQuality = $this->resetQuality($calculatedQuality);
        }
        return $calculatedQuality;
    }
}
