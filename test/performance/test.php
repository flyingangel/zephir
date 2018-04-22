<?php

class Test {

    //duration
    private static $tStart;
    private static $tStop;
    //memory
    private static $mStart;
    private static $mStop;


    public function __construct($name) {
        printf('Test: %s' . PHP_EOL, $name);
    }


    public static function toMb($memory) {
        return round($memory / 1024 / 1024, 2);
    }


    public static function start() {
        self::$tStart = microtime(true);
        self::$mStart = memory_get_usage();
        echo "Memory at start: " . self::toMb(self::$mStart) . PHP_EOL;
    }


    public static function stop() {
        self::$tStop = microtime(true) - self::$tStart;
        self::$mStop = memory_get_usage();
        echo "Memory at stop: " . self::toMb(self::$mStop) . PHP_EOL;
    }


    public static function generateRandomString($length = 8) {
        return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    }


    public static function getRandomStrings($size = 100000, $length = 8) {
        $arr = [];

        for ($i = 0; $i < $size; $i++) {
            $str       = Test::generateRandomString($length);
            $arr[$str] = $str;
        }

        return $arr;
    }


    /**
     *
     * @param type $msg Name of the test
     * @param callable $func Function to execute
     */
    public function test(callable $func, $iteration = 100000) {
        echo PHP_EOL;

        self::start();
        $res   = [];
        for ($i = 0; $i < $iteration; $i++)
            $res[] = $func();
        self::stop();

        $duration = self::$tStop;
        $unit     = 's';
        if ($duration < 1) {
            $duration *= 1000;
            $unit     = 'ms';
        }

        $memory = self::toMb(self::$mStop - self::$mStart);

        echo "Memory: " . $memory . ' Mb' . PHP_EOL;
        echo "Time: " . $duration . ' ' . $unit . PHP_EOL;
        echo PHP_EOL;
    }

    public function testOnce(callable $func) {
        $this->test($func, 1);
    }


}
