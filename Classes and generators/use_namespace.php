<?php
require_once './namespace.php';
require_once './namespace2.php';
require_once './namespace3.php';
use Oreilly\Php7\UpToSpeed\{
    Nouns\Language,
    Nouns\Operator,
    Verbs\Possess
};
use Oreilly\Php7\UpToSpeed\Common\{
    DoSomething,
    const PIE,
    const LOCATION,
    function doubleIt,
    function cube
};

$number = 4;
echo '<p>' . LOCATION . ' is a great place to live.</p>';
echo "<p>Twice $number is " . doubleIt($number) . ", but cubed, it's " . cube($number) . '.</p>';
$obj = new DoSomething();
echo '<p>Yum, ' . PIE . '!</p>';
