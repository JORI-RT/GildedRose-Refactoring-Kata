<?php

declare(strict_types=1);

namespace GildedRose;

class CalculatorFactory
{
    public static function create($name) : Calculator
    {
        if ($name == 'Aged Brie') {
            return new AgedBrieCalculator();
        } else if ($name == 'Backstage passes to a TAFKAL80ETC concert') {
            return new BackstagePassesCalculator();
        } else if ($name == 'Sulfuras, Hand of Ragnaros') {
            return new SulfurasCalculator();
        } else {
            return new ItemCalculator();
        }
    }
}
