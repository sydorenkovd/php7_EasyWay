<?php
/*
 * Dereferencing a return value, then calling it.
 */

$greet = function() {
    return [
        'welcome' => function() {
            echo 'Hi, there!';
        },
        'farewell' => function() {
            echo 'So long!';
        }
    ];
};

$greet()['welcome']();