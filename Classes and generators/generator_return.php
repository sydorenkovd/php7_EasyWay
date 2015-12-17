<?php
function processCsv($file, $omitTitles = true) {
    $csv = new SplFileObject($file);
    $records = 0;
    if ($omitTitles) {
        // Get the first line but do nothing with it
        $csv->getCurrentLine();
    }
    while (!$csv->eof()) {
        // Get the current line
        $line = $csv->fgetcsv();
        // Skip blank lines that return a single null element
        if (count($line) > 1 && !is_null($line[0])) {
            yield $line;
            $records++;
        }
    }
    return "$records records processed from $file";
}

$names = processCsv('names.csv');

foreach ($names as $name) {
    echo implode(' ', $name) . '<br>';
}
echo $names->getReturn();