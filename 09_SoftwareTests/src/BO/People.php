<?php

namespace App\BO;

use App\Service\ICalculator;

class People
{
    public const NAME = "name";
    public const AGE = "age";

    private ICalculator $calculator;

    public function __construct(ICalculator $calculator)
    {
        $this->calculator = $calculator;
    }

    /**
     * @param array<array<People::*, string|integer>> $people
     * @return float
     */
    public function calculatePeopleAge(array $people): float
    {
        $ages = array_map(fn(array $person) => $person[self::AGE], $people);

        return $this->calculator->sumOfAllNumbers(...$ages);
    }
}
