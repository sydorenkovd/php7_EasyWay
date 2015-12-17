<?php
class foo {
    public $bar = 'I am bar.';
    public $arr = ['I am A.', 'I am B.', 'I am C.'];
    public $r   = 'I am r.';
}

$foo = new foo();
$b = 'bar';
echo $foo->$b . '<br>';

$baz = array('foo', 'bar', 'baz', 'quux');
echo $foo->$baz[1] . '<br>';

$a = 'arr';
echo $foo->$a[1] . '<br>';
echo $foo->{$a}[1];