<?php

use Flyingangel\Zephir\CArray;

require '../test.php';

$test = new Test("In array");

$arr = Test::getRandomStrings();

$test->testOnce(function() use ($arr) {
    return CArray::inArrayInt('54545', $arr);
});

//native
$test->testOnce(function() use ($arr) {
	return in_array('54545', $arr);
});

//old
$test->testOnce(function() use ($arr) {
    foreach ($arr as $v)
    {
        if ($v===54545)
            return true;
    }

    return false;
});

