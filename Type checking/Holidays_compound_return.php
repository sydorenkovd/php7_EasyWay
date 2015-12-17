<?php
require_once './HolidayInterface.php';
//compound return type and typeError in error case
//function say($word) : string {
//    return "Hello, " . $word
//}

class Holidays implements HolidayInterface
{
    protected $date;

    public function __construct($year = null)
    {
        $y = $year ?? date('Y');
/*
 * http://www.php.net/manual/en/datetimeimmutable.construct.php
 * only for php 5.5 and more
 */
        $this->date = new DateTimeImmutable("January 1, $y");
    }

    public function getMemorial() : DateTimeImmutable
    {
        return $this->date->modify('last Monday of May');
    }

    public function getThanksgiving() : DateTimeImmutable
    {
        return $this->date->modify('fourth Thursday of November');
    }
}


$holidays = new Holidays(2016);
$memorial = $holidays->getMemorial();
echo $memorial->format('l, F j, Y') . '<br>';

$thanksgiving = $holidays->getThanksgiving();
echo $thanksgiving->format('l, F j, Y') . '<br>';

$blackFriday = $thanksgiving->modify('+1 day');
echo $blackFriday->format('l, F j, Y') . '<br>';