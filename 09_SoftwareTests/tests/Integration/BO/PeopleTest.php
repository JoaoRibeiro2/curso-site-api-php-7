<?php

namespace App\Tests\Integration\BO;

use App\BO\People;
use App\Service\Calculator;
use PHPUnit\Framework\TestCase;

class PeopleTest extends TestCase
{
    public function testPeopleAgeAndCalculatorEqualsTo(): void
    {
        $calculator = new Calculator();
        $people = new People($calculator);

        $actual = $people->calculatePeopleAge([
            [
                People::NAME => 'Fulano',
                People::AGE => 23,
            ],
            [
                People::NAME => 'Ciclano',
                People::AGE => 25,
            ],
        ]);
        $expected = 48;

        $this->assertEquals($expected, $actual);
    }
}
