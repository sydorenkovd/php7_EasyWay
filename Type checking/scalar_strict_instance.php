<?php
declare(strict_types=1);

require_once './functions/scalar_strict.php';

// Included functions use strict type checks for return value
// Parameter type checking depends on mode in this file

//echo var_dump(addIntegers(4.5, 3.2)) . '<br>';
echo var_dump(addIntegers(4, 3)) . '<br>';

//echo var_dump(addFloats(5, '3')) . '<br>';
echo var_dump(addFloats(5.5, 3)) . '<br>';

//echo var_dump(upperRev(12345)) . '<br>';
echo var_dump(upperRev('Fahrenheit 451')) . '<br>';

//echo var_dump(isItTrue(3.6));
echo var_dump(isItTrue(false));