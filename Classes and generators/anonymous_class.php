<?php
$json = file_get_contents('./sf_bikes.json');
$json = json_decode($json);

$bikeSpaces = new class() extends SplHeap
{
    protected function compare($data1, $data2)
    {
        return (int) $data2[8] <=> (int) $data1[8];
    }
};

foreach ($json->data as $data) {
    $bikeSpaces->insert($data);
}

$bikeSpaces = new class($bikeSpaces) extends FilterIterator
{
    public function accept()
    {
        return $this->current()[10] == 'MARKET';
    }
};

foreach ($bikeSpaces as $b) {
    echo $b[8] . ' Spaces: ' . $b[12] . '<br>';
}