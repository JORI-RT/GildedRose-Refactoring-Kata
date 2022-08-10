<?php

declare(strict_types=1);

namespace GildedRose;

abstract class BaseCalculator 
{
    
    public function __construct()
    {
    }
    
    abstract public function calculateQuality(int $sell_in, int $quality): int;

    protected function upQuality($quality): int
    {
        if ($quality < 50) {
            return $quality + 1;
        }
        return $quality;
    }

    protected function downQuality($quality): int
    {
        if ($quality > 0) {
            return $quality - 1;
        }
        return $quality;
    }

    protected function resetQuality($quality): int
    {
        return 0;
    }
    
 }

