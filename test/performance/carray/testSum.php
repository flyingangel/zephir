<?php

use Flyingangel\Zephir\CArray;

require '../test.php';

$test = new Test("Array matches");

$arr = [];

for ($i = 0; $i < 100000; $i++)
    $arr[] = $i;


$test->testOnce(function() use ($arr) {
    return CArray::sum($arr);
});


//native
$test->testOnce(function() use ($arr) {
    return array_sum($arr);
});


//old
$test->testOnce(function() use ($arr) {
    $sum = 0;

    foreach ($arr as $a)
        $sum += $a;

    return $sum;
});
