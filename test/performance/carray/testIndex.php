<?php

use Flyingangel\Zephir\CArray;

require '../test.php';

$test = new Test("Array index");

$arr = Test::getRandomStrings();

$test->testOnce(function() use ($arr) {
    $return = CArray::index(array_values($arr));

    return $return;
});

//old
$test->testOnce(function() use ($arr) {
    $return = [];
    foreach ($arr as $v)
        $return[$v] = $v;

    return $return;
});

