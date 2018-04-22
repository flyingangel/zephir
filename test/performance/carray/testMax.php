<?php

use Flyingangel\Zephir\CArray;

require '../test.php';

$test = new Test("Array matches");

$arr = [];

for ($i=0; $i<100000; $i++)
    $arr[] = $i;


$test->testOnce(function() use ($arr) {
    $return = CArray::max($arr);

    return $return;
});


//native
$test->testOnce(function() use ($arr) {
    return max($arr);
});


//old
$test->testOnce(function() use ($arr) {
    $max = 0;
    foreach ($arr as $a)
    {
        if ($a > $max)
            $max = $a;
    }

    return $max;
});
