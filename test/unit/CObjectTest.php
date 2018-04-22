<?php

use PHPUnit\Framework\TestCase;
use Flyingangel\Zephir\CObject;

class CObjectTest extends TestCase
{


    public function testMerge()
    {
        $o1    = new stdClass;
        $o1->a = 'a';
        $o1->b = 'b';
        $o2    = new stdClass;
        $o2->b = 'xxx';
        $o2->c = 'c';

        $o = CObject::merge($o1, $o2);

        $expect    = new stdClass;
        $expect->a = 'a';
        $expect->b = 'b';
        $expect->c = 'c';

        $this->assertEquals($expect, $o);
    }


    public function testToArray()
    {
        $o    = new stdClass;
        $o->a = 'a';
        $o->b = 'b';
        $o    = CObject::toArray($o);

        $this->assertEquals([
            'a' => 'a',
            'b' => 'b'
                ], $o);
    }


    public function testIndexBy()
    {
        $o1 = new stdClass;
        $o1->k1 = 'abc';
        $o2 = new stdClass;
        $o2->k1 = 'xyz';

        $arr = [$o1, $o2];
        $arr = CObject::indexBy($arr, 'k1');

        $this->assertEquals([
            'abc' => $o1,
            'xyz' => $o2
                ], $arr);
    }


}
