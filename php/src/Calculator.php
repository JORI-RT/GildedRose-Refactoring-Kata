<?php

declare(strict_types=1);

namespace GildedRose;

interface Calculator {

   public function calculateQuality(int $sell_in, int $quality): int;

}
