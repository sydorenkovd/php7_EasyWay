<?php
/*
 * Accessing a static property non-statically generates an
 * E_NOTICE error in PHP 7. It's worth taking notice because
 * it doesn't work!
 */

class TaxCalc
{
    public static $rate = 0.2;

    public function calculate($cost)
    {
        return $cost + $cost * self::$rate;
    }
}

$tax = new TaxCalc();

$tax->rate = 0.25;

echo $tax->calculate(100);