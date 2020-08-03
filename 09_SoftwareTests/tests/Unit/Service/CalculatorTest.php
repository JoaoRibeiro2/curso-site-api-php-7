<?php

namespace App\Tests\Unit\Service;

use App\Service\Calculator;
use App\Service\ICalculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testCalculatorInstanceOf(): void
    {
        $actual = new Calculator();
        $expected = ICalculator::class;

        $this->assertInstanceOf($expected, $actual);
    }

    public function testSumOfAllNumbersReturn(): void
    {
        $calculator = new Calculator();

        $actual = $calculator->sumOfAllNumbers(1, 4, 2);
        $expected = 7;

        $this->assertEquals($expected, $actual);
    }

    public function testIfICalculatorHasSumOfAllNumbersMethod(): void
    {
        $calculator = $this->createMock(ICalculator::class);

        $this->assertTrue(method_exists($calculator, 'sumOfAllNumbers'));
    }
}
