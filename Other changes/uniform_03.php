<?php
/*
 * Dereferencing an array of objects to get a property.
 */
class Person
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}

$person1 = new Person('David');
$person2 = new Person('Adam');

$person = [$person1, $person2][1];
echo $person->name;

//echo [$person1, $person2][1]->name;