<?php
declare(strict_types=1);

function addIntegers(int $a, int $b) : int {
    return $a + $b;
}

try {
    $sum = addIntegers(3, 50);
    echo $sum . '<br>';
    if ($sum > 10) {
        include './parse_error.php';
    }
} catch (Throwable $e) {
    echo get_class($e) . ': in ' . $e->getFile() . ', on line ' . $e->getLine() . ', the following error occurred: ' . $e->getMessage();
} finally {
    echo '<p>Finally has been called.</p>';
}