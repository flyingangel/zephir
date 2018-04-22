<?php

use Flyingangel\Zephir\CString;

require '../test.php';

$test = new Test("String end with");

$haystack = CString::random(10000);
$needle = CString::random(1);

$test->test(function() use ($haystack, $needle) {
    return CString::endsWith($haystack, $needle);
});

//old
$test->test(function() use ($haystack, $needle) {
    return $needle !== '' && $needle === substr($haystack, -strlen($needle));
});

