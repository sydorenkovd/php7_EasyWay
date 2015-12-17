<?php
/*
 * Importing two traits that define the same property is no
 * longer considered a reportable error, as long as they have
 * the same value. The previous strict standards warning was
 * simply a notice about coding style.
 */

trait TraitA
{
    public $taxRate = 0.2;
}

trait TraitB
{
    public $taxRate = 0.2;
}

class TaxCalc
{
    use TraitA, TraitB;
}

$tax = new TaxCalc();
echo $tax->taxRate;