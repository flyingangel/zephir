<?php

use Flyingangel\Zephir\CString;

require '../test.php';

$test = new Test("String remove accent");

$str = "Phrase accent éàç";

$test->test(function() use ($str) {
    return CString::removeAccents($str);
});

