<?php

declare(strict_types=1);

namespace GildedRose;

class SulfurasCalculator extends BaseCalculator
{
    
    public function calculateQuality(int $sell_in, int $quality): int
    {
        return $quality;
    }
 }
