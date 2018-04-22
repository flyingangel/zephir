<?php

use PHPUnit\Framework\TestCase;
use Flyingangel\Zephir\CString;

class CStringTest extends TestCase
{


    public function testCamelize()
    {
        $str = "This is_a;string.to,test";

        $t1 = CString::camelize($str);
        $t2 = CString::camelize($str, true);

        $this->assertEquals("thisIsAStringToTest", $t1);
        $this->assertEquals("ThisIsAStringToTest", $t2);
    }


    public function testRandom()
    {
        $str = CString::random(8);

        $this->assertEquals(8, strlen($str));
    }


    public function testRemoveAccent()
    {
        $str = "Phrase accent éàç";
        $str = CString::removeAccents($str);

        $this->assertEquals("Phrase accent eac", $str);
    }


    public function testRemoveWhitespace()
    {
        $str = "A string of\ntest";
        $str = CString::removeWhitespaces($str);

        $this->assertEquals("Astringoftest", $str);
    }


    public function testRemovePunctuation()
    {
        $str = "abcde ((-!?.,/";
        $str = CString::sanitize($str);

        $this->assertEquals("abcde", $str);
    }


    public function testSanitize()
    {
        $str = "There's a cat!";
        $str = CString::sanitize($str);

        $this->assertEquals("theresacat", $str);
    }


    public function testStartsWith()
    {
        $haystack = "abcdefgh";
        $this->assertTrue(CString::startsWith($haystack, "abc"));
        $this->assertFalse(CString::startsWith($haystack, ''));
        $this->assertFalse(CString::startsWith($haystack, false));
        $this->assertFalse(CString::startsWith($haystack, null));
    }


    public function testEndsWith()
    {
        $haystack = "abcdefgh";
        $this->assertTrue(CString::endsWith($haystack, "gh"));
        $this->assertFalse(CString::endsWith($haystack, ''));
        $this->assertFalse(CString::endsWith($haystack, false));
        $this->assertFalse(CString::endsWith($haystack, null));
    }


}
