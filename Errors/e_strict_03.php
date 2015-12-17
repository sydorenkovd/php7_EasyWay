<?php
/*
 * Signature mismatch during inheritance has been reclassified
 * as an E_WARNING error in PHP 7. A similar mismatch with an
 * interface or abstract method triggers a fatal error.
 */

class Base
{
    public function greet()
    {
        echo 'Hello, world!';
    }
}

class SubClass extends Base
{
    public function greet($input)
    {
        echo "Hello, $input!";
    }
}

$object = new SubClass();
$object->greet('David');