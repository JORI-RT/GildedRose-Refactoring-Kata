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
            $this->upQuality();
            if ($this->getSellIn() < 0) {
                $this->upQuality();
            }
        } else if ($this->getName() == 'Backstage passes to a TAFKAL80ETC concert') {
            $this->upQuality();
            if ($this->getSellIn() < 10) {
                $this->upQuality();
            }
            if ($this->getSellIn() < 5) {
                $this->upQuality();
            }
            if ($this->getSellIn() < 0) {
                $this->resetQuality();
            }
        } else {
            $this->downQuality();
            if ($this->getSellIn() < 0) {
                $this->downQuality();
            }
        }
    }

    private function upQuality(): void
    {
        if ($this->quality < 50) {
            $this->quality = $this->quality + 1;
        }
    }

    private function downQuality(): void
    {
        if ($this->quality > 0) {
            $this->quality = $this->quality - 1;
        }
    }

    private function resetQuality(): void
    {
        $this->quality = 0;
    }

    public function __toString(): string
    {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }
}
