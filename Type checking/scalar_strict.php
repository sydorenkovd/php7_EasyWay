<?php
// Turn on strict mode
declare(strict_types=1);

// Strictly type-checked return values
// Type checking of params depends on calling file

function addIntegers(int $a, int $b) : int {
    return $a + $b;
}

function addFloats(float $a, float $b) : float {
    return $a + $b;
}

function upperRev(string $a) : string {
    return strtoupper(strrev($a));
}

function isItTrue(bool $a) : string {
    return $a ? 'true' : 'false';
}