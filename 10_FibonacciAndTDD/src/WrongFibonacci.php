<?php

namespace App;

class WrongFibonacci
{
    public function calc(int $position): int
    {
        if ($position === 1) {
            return 1;
        }

        if ($position === 2) {
            return 1;
        }

        if ($position === 3) {
            return 2;
        }

        if ($position === 4) {
            return 3;
        }

        if ($position === 5) {
            return 5;
        }

        if ($position === 6) {
            return 8;
        }
    }
}
