php7 guide  :rocket:
===============================================================
For easy using new features and functionality Part 1.

It was created for the fastest way to switch and adapt PHP world for new version.

Let's change PHP world together!
REQUIREMENTS
------------
[php7_EasyWay](https://github.com/sydorenkovd/php7_EasyWay) require php 7 and php 5.6 for testing.
How instal php 7 on your local server: :elephant:
-------------------------------------
You can upload it from [php.net](http://php.net/archive) and instal php7 manualy, have a look how: 
* [Instal on Debian](https://www.howtoforge.com/tutorial/how-to-install-php-7-on-debian/)
* [Install PHP 7 on Ubuntu](http://www.zimuel.it/install-php-7/)

But if you are lazy programmer and don't want to do all job by yourself, you can use PHP stack for:
* [WAMP](https://bitnami.com/stack/wamp/installer)
* [LAMP](https://bitnami.com/stack/lamp/installer)
* [MAMP](https://bitnami.com/stack/mamp/installer)

DOCUMENTATION
-------------
#### New operators and functions:

##### spaceship "<=>" [Full example](https://github.com/sydorenkovd/php7_EasyWay/blob/master/New%20operators%20and%20functions/spaceship_operator.php)
```php
/*
 * sort function, if first is bigger than second return -1, else return 1, or 0 if it's equals
 */
usort($names, function($a, $b) {
    return [$a[1], $a[0]] <=> [$b[1], $b[0]];
});
```
##### Nullcoalesce operator "??" [Full example](https://github.com/sydorenkovd/php7_EasyWay/blob/master/New%20operators%20and%20functions/nullcoalesce_operator.php) | [form for example](https://github.com/sydorenkovd/php7_EasyWay/blob/master/New%20operators%20and%20functions/nullcoalesce_form.php)
```php
/*
 * return first not null value
 */
$name = $_POST['name'] ?? 'guest';
```
##### Unicode
```php
// Four-digit codepoints
echo "<p>Caf\u{00e9} Royal</p>";

$tel = "\u{260E}";

echo "<p>$tel (212) 555-0199</p>";

// Five-digit codepoint
echo "<p>PHP 7 has spaceships! \u{1F680}</p>";

// Leading zeros omitted
echo "<p>Caf\u{e9} Royal</p>";

// JSON not affected
echo json_decode("\"\u00e9\"");
```
##### generate random string
```php
bin2hex(random_bytes(20));
```
* [random_int](https://github.com/sydorenkovd/php7_EasyWay/blob/master/New%20operators%20and%20functions/random_int.php)
* [intdiv](https://github.com/sydorenkovd/php7_EasyWay/blob/master/New%20operators%20and%20functions/intdiv_convertMetersToYards.php)

##### New yield: [return operator](https://github.com/sydorenkovd/php7_EasyWay/blob/master/Classes%20and%20generators/generator_return.php) | [delegate generator](https://github.com/sydorenkovd/php7_EasyWay/blob/master/Classes%20and%20generators/delegate_generator.php)

Now we have new operator _return_, that we can use for some final value, it's actual for ending iteration. We also can use it for testing, and be able to know about correct parsing of yield.

 Also yields can return some value from other yields, in this way we can create more complicated operations that is based on simple ones.

```php
function listA() {
    yield 2;
    yield 3;
    yield 4;
}

function listB() {
    yield 1;
    yield from listA(); // 'listA' is working here
    yield 5;
    return 'success'; // final result, that we can check out later
}

foreach (listB() as $val) {
    echo "\n $val"; // output values from 1 to 5
}

$genB()->getReturn(); // return 'success' if there are no errors
```

#### Type checking:

##### Scalar parameter hints: [Full example](https://github.com/sydorenkovd/php7_EasyWay/blob/master/Type%20checking/Holidays_compound_return.php) | [Interface for example](https://github.com/sydorenkovd/php7_EasyWay/blob/master/Type%20checking/HolidayInterface.php)
1. Mode in definition file is irrelevant
2. Mode is determined by file that calls the function
3. Weak mode in file that calls the function.<br>
Parameters are cast to specified data type
4. Strict mode in file that the function.<br>
Parameters must match the specified type

##### Compound return type and typeError in error case:
```php
function say(string $word) : string {
return "Hello, " . $word
}
```
##### Scalar type hints: [Full example](https://github.com/sydorenkovd/php7_EasyWay/blob/master/Type%20checking/scalar_strict_instance.php) | [strict mode for example](https://github.com/sydorenkovd/php7_EasyWay/blob/master/Type%20checking/scalar_strict.php)
1. Parameter type hints<br>
Mode is determined by the file calling the function
2. Return type declarations<br>
Mode is determined by the file that defines the function
3. Weak mode casts values to the specified type
4. Strict mode enforces use of the specified type

##### Turn on strict mode
Worked by the function was defined, but no where function is gone.
```php
declare(strict_types=1);
```
##### preg_replace_callback_array

Perform a regular expression search and replace using callbacks 
```php
preg_replace_callback_array([$pattern => function($matches){}
[, $pattern => function($matches){}]
], $list);
```
Example:
```php
preg_replace_callback_array(
    [
        '~[a]+~i' => function ($match) {
            echo strlen($match[0]), ' matches for "a" found', PHP_EOL;
        },
        '~[b]+~i' => function ($match) {
            echo strlen($match[0]), ' matches for "b" found', PHP_EOL;
        }
    ],
    $subject
);
```
Result:
```
6 matches for "a" found
3 matches for "b" found
```
#### Classes and generators:

##### Anonymous classes: [Full example](https://github.com/sydorenkovd/php7_EasyWay/blob/master/Classes%20and%20generators/anonymous_class.php)
1. Syntax is identical to a named class, but without a name
2. Can be assigned to a variable, returned from a function, or passed as an argument to a function

Uses:
* When the class does not need to be documented
* Single-use class
* Unit testing

For more improved programmers: [Delegate](https://github.com/sydorenkovd/php7_EasyWay/blob/master/Classes%20and%20generators/delegate_generator.php) and [Return generator](https://github.com/sydorenkovd/php7_EasyWay/blob/master/Classes%20and%20generators/generator_return.php)

New namespace using: [Full example](https://github.com/sydorenkovd/php7_EasyWay/blob/master/Classes%20and%20generators/use_namespace.php)
```php
use Symfony\Component\Console\{
  Helper\Table,
  Input\ArrayInput,
  Input\InputInterface,
  Output\NullOutput,
  Output\OutputInterface,
  Question\Question,
  Question\ChoiceQuestion as Choice,
  Question\ConfirmationQuestion,
};
use app\classes\common{
    DoSomething,
    const PIE,
    const LOCATION,
    function doubleIt,
    function cube
};
```
#### Errors
***
Also you can read about new errors in php 7, as for me it's become more obviously: [Errors](https://github.com/sydorenkovd/php7_EasyWay/tree/master/Errors)

In addition read [wikiPHP](https://wiki.php.net/rfc/engine_exceptions_for_php7) and [manual](http://php.net/manual/en/language.errors.php7.php) for better understanding.
***
#### Other changes:
```php
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
```
##### Dereferencing a return value, then calling it.
```php
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
```
##### Dereferencing an array of objects to get a property.
```php
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
```
#### Uniform variable syntax: [Example](https://github.com/sydorenkovd/php7_EasyWay/blob/master/Other%20changes/variable_variables.php)
1. Internally consistent way of interpreting variables
2. Opens up wide range of new structures
3. Immediately invoked function expression(IIFE)
4. Variable variables<br>
Backward incompatible changes affect some edge cases<br>
Simple variable variables are unaffected

You can read about it [here](https://wiki.php.net/rfc/uniform_variable_syntax)

Сonclusion
----------
PHP 7 is faster, cleaner and greener $$$!
* Up to 3x increased perfomance
* Outdated features removed
* Greater internal consistency
* Little backward compatibility breakage

### Improved features:
* Handling of fatal errors
* Simplified debugging with assert()
* Anonymous classes
* Simplified binding to closures
* New operators<br>
Spaceship(combined comparison)<br>
Null coalesce

### A forward-looking version
* Generator delegation--coroutines
* Increased deferencing possibilities
* Immediately invoked function expressions

#### I hope you founded it useful and will develop using PHP 7 in your projects.
## Write code and enjoy process, X :star2:
