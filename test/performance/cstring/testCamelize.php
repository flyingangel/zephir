<?php

use Flyingangel\Zephir\CString;

require '../test.php';

$test = new Test("String camelize");

$str = "This is_some.string";


function camelize($str) {
    $capitalizeFirstCharacter = false;
    $str                      = preg_replace("/\W|_/", " ", $str);
    //capitalize first letter of each word
    $str                      = str_replace(" ", "", ucwords($str));

    if (!$capitalizeFirstCharacter) {
        $str = lcfirst($str);
    }
}


$test->test(function() use ($str) {
    return CString::camelize($str);
});

//old
$test->test(function() use ($str) {
    return camelize($str);
});

