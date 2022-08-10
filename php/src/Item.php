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

    public function getName()
    {
        return $this->name;
    }
    
    public function getSellIn()
    {
        return $this->sell_in;
    }
    
    public function getQuality()
    {
        return $this->quality;
    }

    public function downSellIn()
    {
        $this->sell_in = $this->sell_in - 1;
    }

    public function upQuality()
    {
        if ($this->quality < 50) {
            $this->quality = $this->quality + 1;
        }
    }

    public function downQuality()
    {
        if ($this->quality > 0) {
            $this->quality = $this->quality - 1;
        }
    }

    public function resetQuality()
    {
        $this->quality = 0;
    }

    public function __toString(): string
    {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }
}
