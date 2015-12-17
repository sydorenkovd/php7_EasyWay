<?php
$tries = 0;
while (true) {
    // Roll two dice
    $dice1 = random_int(1, 6);
    $dice2 = random_int(1, 6);

    echo "$dice1 $dice2<br>";
    $tries++;

    // End the loop when we get a double six
    if ($dice1 == 6 && $dice2 == 6) {
        $throws = $tries > 1 ? 'throws' : 'throw';
        echo "<p>It took $tries $throws to get a double six";
        break;
    }
}