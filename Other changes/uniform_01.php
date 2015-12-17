<?php
/*
 * Example of an IIFE (immediately invoked function expression).
 * This is a construction familiar from JavaScript when you don't
 * want to pollute the global scope with variables or objects.
 */

(function($name = null) {
    $name = $name ?? 'stranger';
    $person = new class($name)
    {
        protected $name;

        public function __construct($name)
        {
            $this->name = $name;
        }

        public function greet()
        {
            echo 'Hi, ' . $this->name;
        }
    };

    $person->greet();

})();
