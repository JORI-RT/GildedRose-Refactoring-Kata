<?php

declare(strict_types=1);

namespace GildedRose;

interface Item
{
	public function updateQuality() :void;
	public function incrementSellIn() :void;
}
