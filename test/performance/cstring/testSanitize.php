<?php

use Flyingangel\Zephir\CString;

require '../test.php';

$test = new Test("String sanitize");

$str = "There's a cat!";

$test->test(function() use ($str) {
    return CString::sanitize($str);
});

