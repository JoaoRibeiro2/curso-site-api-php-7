<?php

namespace App\Tests;

use App\Fibonacci;
use PHPUnit\Framework\TestCase;

class FibonacciTest extends TestCase
{
    public function testFibonacci(): void
    {
        $fibonacci = new Fibonacci();

        $actual = $fibonacci->calc(6);
        $expected = 8;

        $this->assertEquals($expected, $actual);
    }

    public function testHigherFibonacci(): void
    {
        $fibonacci = new Fibonacci();

        $actual = $fibonacci->calc(50);
        $expected = 12586269025;

        $this->assertEquals($expected, $actual);
    }
}
