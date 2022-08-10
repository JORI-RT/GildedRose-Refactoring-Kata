<?php

declare(strict_types=1);

namespace GildedRose;

class AgedBrieCalculator 
{
    
    public function __construct()
    {
    }
    
    public function calculateQuality(int $sell_in, int $quality)
    {
        $calculatedQuality = $this->upQuality($quality);
        if ($sell_in < 0) {
            $calculatedQuality = $this->upQuality($calculatedQuality);
        }
        return $calculatedQuality;
    }

    private function upQuality($quality): int
    {
        if ($quality < 50) {
            return $quality + 1;
        }
    }

    private function downQuality($quality): int
    {
        if ($quality > 0) {
            return $quality - 1;
        }
    }

    private function resetQuality($quality): int
    {
        return 0;
    }
    
 }

