<?php

namespace App;

class Fibonacci
{
    public function calc(int $position): int
    {
        $fibonnaci = [];

        for ($p = 0; $p < $position; $p++) {
            if ($p === 0 || $p == 1) {
                $fibonnaci[] = 1;
            } else {
                $fibonnaci[] = $fibonnaci[$p - 1] + $fibonnaci[$p - 2];
            }
        }

        return end($fibonnaci);
    }
}
