<?php

use Flyingangel\Zephir\CString;

require '../test.php';

$test = new Test("String remove whitespace");

$str = "This is a string to test";

$test->test(function() use ($str) {
    return CString::removeWhitespaces($str);
});

$test->test(function() use ($str) {
    return preg_replace("/\s+/", "", $str);
});
