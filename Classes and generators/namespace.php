<?php
namespace Oreilly\Php7\UpToSpeed\Common;

class DoSomething
{
    public function __construct()
    {
        echo '<p>DoSomething initialized.</p>';
    }
}

const PIE = 'steak and mushroom pie';
const LOCATION = 'London';

function doubleIt($num) {
    return $num * 2;
}

function cube($num) {
    return $num ** 3;
}