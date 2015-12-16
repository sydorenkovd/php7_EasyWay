<?php
$file = new SplFileObject('names.csv');

// Discard the column headers
$file->getCurrentLine();

// Build a multidimensional array of the remaining lines
while (!$file->eof()) {
    $line = $file->fgetcsv();
    // Ignore empty lines
    if (!is_null($line[0])) {
        $names[] = $line;
    }
}
/*
 * sort function, if first is bigger than second return -1, else return 1, or 0 if it's equals
 */
usort($names, function($a, $b) {
    return [$a[1], $a[0]] <=> [$b[1], $b[0]];
});


// Display the names
foreach ($names as $name) {
    echo implode(' ', $name) . '<br>';
}