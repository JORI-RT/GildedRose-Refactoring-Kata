<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    /**
     * @var Item[]
     */
    public $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

	public function updateQuality(int $days = 1): void
	{
		if ($days <= 0) {
    		return;		// do nothing
    	}
    	
		foreach ($this->items as $item) {
			for ($i = 0; $i < $days; $i++) {
				$item->updateQuality();
				$item->incrementSellIn();
			}
		}
	}

	

}
