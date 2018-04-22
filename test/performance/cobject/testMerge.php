<?php

use Flyingangel\Zephir\CArray;
use Flyingangel\Zephir\CObject;

require '../test.php';

$test = new Test("Object merge");

$arr = Test::getRandomStrings();
$arr = CArray::toObject($arr);
$arr2 = Test::getRandomStrings();
$arr2 = CArray::toObject($arr2);

$test->testOnce(function() use ($arr, $arr2) {
    return CObject::merge($arr, $arr2);
});

//old
$test->testOnce(function() use ($arr, $arr2) {
    foreach ($arr2 as $k=>$v)
        $arr->$k = $v;
    return $arr;
});

