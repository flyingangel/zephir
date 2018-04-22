<?php

use Flyingangel\Zephir\CArray;

require '../test.php';

$test = new Test("Array merge associative");

$arr = Test::getRandomStrings();
$arr2 = Test::getRandomStrings();

$test->testOnce(function() use ($arr, $arr2) {
    $return = CArray::amerge($arr, $arr2);
    return $return;
});

//native
$test->testOnce(function() use ($arr, $arr2) {
    return $arr + $arr2;
});

//old
$test->testOnce(function() use ($arr, $arr2) {
    foreach ($arr2 as $k => $v)
        $arr[$k] = $v;
    return $arr;
});

