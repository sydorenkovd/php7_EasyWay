<?php
function convertMetersToYards($meters) {
    // Convert meters to tenths of a millimeter
    $mmx10 = $meters * 10000;
    // Divide by 9144 to get yards
    $y = intdiv($mmx10, 9144);
    // Use modulo division to get the remainder
    $f = $mmx10 % 9144;
    // Divide by 3048 to get feet
    $ft = intdiv($f, 3048);
    // Get the remainder and convert to inches
    $i = $f % 3048;
    $i = number_format($i / 254, 2);
    return "$y yards $ft feet $i inches";
}

echo convertMetersToYards(50);