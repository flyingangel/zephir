<?php

use Flyingangel\Zephir\CArray;
use Flyingangel\Zephir\CObject;

require '../test.php';

$test = new Test("Object to array");

$arr = Test::getRandomStrings();
$arr = CArray::toObject($arr);


function object2array($object) {
    $arr     = [];
    foreach ($object as $k => $v)
        $arr[$k] = is_object($v) ? object2array($v) : $v;
}


$test->testOnce(function() use ($arr) {
    return CObject::toArray($arr);
});


$test->testOnce(function() use ($arr) {
    return object2array($arr);
});


