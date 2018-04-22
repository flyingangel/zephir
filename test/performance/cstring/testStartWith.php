<?php

use Flyingangel\Zephir\CString;

require '../test.php';

$test = new Test("String start with");

$haystack = CString::random(10000);
$needle = CString::random(1);

$test->test(function() use ($haystack, $needle) {
    return CString::startsWith($haystack, $needle);
});

//old
$test->test(function() use ($haystack, $needle) {
    return $haystack[0] === $haystack[0] ? $needle !== '' && strpos($haystack, $needle) === 0 : false;
});

