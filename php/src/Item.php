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
    
    /**
     * @var Calculator
     */
    private $calculator;

    public function __construct(string $name, int $sell_in, int $quality)
    {
        $this->name = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
        $this->calculator = CalculatorFactory::create($name);
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

    public function update(): void
    {
        $this->downSellIn();
    }

    private function downSellIn(): void
    {
        $this->sell_in = $this->calculator->calculateSellIn($this->getSellIn());
        $this->updateQuality();
    }

    private function updateQuality(): void
    {
        $this->quality = $this->calculator->calculateQuality($this->getSellIn(), $this->getQuality());
    }

    public function __toString(): string
    {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }
}
