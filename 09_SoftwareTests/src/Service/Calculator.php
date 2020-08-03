<?php

namespace App\Service;

class Calculator implements ICalculator
{
    public function sumOfAllNumbers(float ...$nums): float
    {
        return array_reduce($nums, fn(float $carry, float $num): float => $carry + $num, 0.0);
    }
}
