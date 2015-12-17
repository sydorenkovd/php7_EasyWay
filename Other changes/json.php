<?php
$floats = ['item1' => 5.0, 'item2' => 6.8, 'item3' => 6.4];
//echo json_encode($floats);

echo json_encode($floats, JSON_PRESERVE_ZERO_FRACTION);