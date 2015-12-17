<?php
class Language {
    private $message;

    public function __construct($lang)
    {
        switch($lang) {
            case 'PHP':
                $this->message = 'PHP 7 rocks.';
                break;
            case 'JavaScript':
                $this->message = 'Front-end heaven or hell?';
                break;
            default:
                $this->message = 'Tell me more.';
        }
    }
}

$getMessage = function($level) {
    return $this->message . ' Popularity level: ' . $level . '.';
};

$lang = new Language('PHP');

//$m = $getMessage->bindTo($lang, 'Language');
//echo $m(2);
echo $getMessage->call($lang, 10);

