<?php

use PHPUnit\Framework\TestCase;
use Flyingangel\Zephir\CArray;

class CArrayTest extends TestCase
{


    public function testIndex()
    {
        $arr = [1, 2, 'abc'];
        $arr = CArray::index($arr);

        $this->assertEquals([
            1     => 1,
            2     => 2,
            'abc' => 'abc'
                ], $arr);
    }


    public function testMerge()
    {
        $arr1 = [1, 2, 'abc'];
        $arr2 = [1 => 3, 2 => 4, 'z' => 'def'];
        $arr  = CArray::merge($arr1, $arr2);

        $this->assertEquals([1, 2, 'abc', 3, 4, 'def'], $arr);
    }


    public function testAMerge()
    {
        $arr1 = [1, 2, 'abc'];
        $arr2 = [1 => 3, 2 => 4, 'z' => 'def'];
        $arr  = CArray::amerge($arr1, $arr2);

        $this->assertEquals([
            0   => 1,
            1   => 2,
            2   => 'abc',
            'z' => 'def'
                ], $arr);
    }


    public function testToObject()
    {
        $arr = ['a', 'b', 'c' => 'c'];
        $arr = CArray::toObject($arr);

        $expect      = new stdClass;
        $expect->{0} = 'a';
        $expect->{1} = 'b';
        $expect->c   = 'c';

        $this->assertEquals($expect, $arr);
    }


    public function testMax()
    {
        $arr = [-1, -4, -8, -1, -4, -7];
        $max = CArray::max($arr);

        $this->assertEquals(-1, $max);
    }


    public function testMin()
    {
        $arr = [-1, 9, -8, -1, -4, -7];
        $min = CArray::min($arr);

        $this->assertEquals(-8, $min);
    }


    public function testSum()
    {
        $arr = [1, -4, 5];
        $sum = CArray::sum($arr);

        $this->assertEquals(2, $sum);
    }

    public function testIndexBy()
    {
        $arr = [
            ['k1' => 'abc'],
            ['k1' => 'xyz'],
        ];
        $arr = CArray::indexBy($arr, 'k1');

        $this->assertEquals([
            'abc' => ['k1' => 'abc'],
            'xyz' => ['k1' => 'xyz'],
        ], $arr);
    }


}
