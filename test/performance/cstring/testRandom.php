<?php

use Flyingangel\Zephir\CString;

require '../test.php';

$test = new Test("String random");

$test->test(function() {
    return CString::getRandom(8);
});

//old
$test->test(function() {
    return Test::generateRandomString();
});

