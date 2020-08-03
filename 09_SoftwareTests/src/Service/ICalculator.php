<?php

namespace App\Service;

interface ICalculator
{
    public function sumOfAllNumbers(float ...$nums): float;
}
