<?php

declare(strict_types=1);

namespace GildedRose;

class ItemCalculator extends BaseCalculator
{
    
    public function calculateQuality(int $sell_in, int $quality): int
    {
        $calculatedQuality = $this->downQuality($quality);
        if ($sell_in < 0) {
            $calculatedQuality = $this->downQuality($calculatedQuality);
        }
        return $calculatedQuality;
    }
 }
