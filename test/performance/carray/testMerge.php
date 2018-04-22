<?php

use Flyingangel\Zephir\CArray;

require '../test.php';

$test = new Test("Array merge");

$arr = Test::getRandomStrings();
$arr2 = Test::getRandomStrings();

$test->testOnce(function() use ($arr, $arr2) {
    $return = CArray::merge($arr, $arr2);

    return $return;
});

//native
$test->testOnce(function() use ($arr, $arr2) {
	return array_merge($arr, $arr2);
});

//old
$test->testOnce(function() use ($arr, $arr2) {
    $return = array_values($arr);
    foreach ($arr2 as $a)
        $return[] = $a;
    return $return;
});

