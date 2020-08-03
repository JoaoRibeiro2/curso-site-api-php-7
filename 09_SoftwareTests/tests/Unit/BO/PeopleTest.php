<?php

namespace App\Tests\Unit\BO;

use App\BO\People;
use App\Service\ICalculator;
use PHPUnit\Framework\TestCase;

class PeopleTest extends TestCase
{
    public function testNameEnum(): void
    {
        $this->assertEquals('name', People::NAME);
    }

    public function testAgeEnum(): void
    {
        $this->assertEquals('age', People::AGE);
    }

    public function testPeopleAge(): void
    {
        $calculator = $this->createMock(ICalculator::class);

        $calculator->expects($this->once())
            ->method('sumOfAllNumbers')
            ->willReturn(10.0);

        $people = new People($calculator);

        $actual = $people->calculatePeopleAge([]);
        $expected = 10.0;

        $this->assertEquals($expected, $actual);
    }
}
