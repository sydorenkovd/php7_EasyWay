<?php
function getCube(array $numbers) {
    foreach ($numbers as &$num) {
        $orig = $num;
        $num = $num ** 3;
        yield "$orig cubed is $num";
    }
    return $numbers;
}

function getSquareRoot(array $numbers) {
    foreach ($numbers as $num) {
        yield "The square root of $num is " . sqrt($num);
    }
    return 'Finished';
}

function combinedGen(array $numbers) {
    $x = yield from getCube($numbers);
    $y = yield from getSquareRoot($x);
    return $y;
}

$numbers = [6, 9, 12];
$gen = combinedGen($numbers);
foreach ($gen as $g) {
    echo $g . '<br>';
}
echo $gen->getReturn();