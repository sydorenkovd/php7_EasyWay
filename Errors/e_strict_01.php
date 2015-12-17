<?php
/*
 * Static calls of non-static methods have been reclassified
 * as deprecated, indicating that this type of code will
 * cease working in a future version of PHP.
 */

class Greet
{
    public function who($name)
    {
        echo "Hello, $name!";
    }
}

Greet::who('World');