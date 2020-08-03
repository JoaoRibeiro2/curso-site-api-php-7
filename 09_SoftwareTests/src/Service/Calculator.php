<?php

namespace App\Service;

class Calculator implements ICalculator
{
    public function sumOfAllNumbers(float ...$nums): float
    {
        return array_reduce($nums, fn($carry, $num) => $carry + $num, 0);
    }
}
