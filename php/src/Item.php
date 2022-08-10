<?php

declare(strict_types=1);

namespace GildedRose;

class Item
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $sell_in;

    /**
     * @var int
     */
    private $quality;

    public function __construct(string $name, int $sell_in, int $quality)
    {
        $this->name = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    public function getName(): string
    {
        return $this->name;
    }
    
    public function getSellIn(): int
    {
        return $this->sell_in;
    }
    
    public function getQuality(): int
    {
        return $this->quality;
    }

    public function downSellIn(): void
    {
        if ($this->getName() == 'Sulfuras, Hand of Ragnaros') {
            return;
        }

        $this->sell_in = $this->sell_in - 1;

        if ($this->getName() == 'Aged Brie') {
            $calculator = new AgedBrieCalculator();
            $this->quality = $calculator->calculateQuality($this->getSellIn(), $this->getQuality());
        } else if ($this->getName() == 'Backstage passes to a TAFKAL80ETC concert') {
            $calculator = new BackstagePassesCalculator();
            $this->quality = $calculator->calculateQuality($this->getSellIn(), $this->getQuality());
        } else {
            $calculator = new ItemCalculator();
            $this->quality = $calculator->calculateQuality($this->getSellIn(), $this->getQuality());
        }
    }

    public function __toString(): string
    {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }
}
