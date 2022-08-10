<?php

declare(strict_types=1);

namespace GildedRose;

class AgedBrieCalculator extends BaseCalculator
{
    
    public function calculateQuality(int $sell_in, int $quality): int
    {
        $calculatedQuality = $this->upQuality($quality);
        if ($sell_in < 0) {
            $calculatedQuality = $this->upQuality($calculatedQuality);
        }
        return $calculatedQuality;
    }
 }

