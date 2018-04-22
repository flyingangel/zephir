<?php

use Flyingangel\Zephir\CArray;

require '../test.php';

$test = new Test("Array to object");

$arr = Test::getRandomStrings();


function array2object($array) {
    $obj     = new stdClass;
    foreach ($array as $k => $v)
        $obj->$k = is_array($v) ? array2object($v) : $v;

    return $obj;
}

$test->testOnce(function() use ($arr) {
    return CArray::toObject($arr);
});


$test->testOnce(function() use ($arr) {
    return array2object($arr);
});


