namespace Flyingangel\Zephir;

class CArray
{

    /**
    * Index an array by its value
    */
    public static function index(const array arr) -> array
    {
        var v;
        array res = [];
        
        for v in arr {
            let res[v] = v;
        }

        return res;
    }


    /**
    * Index an array by a chosen key
    */
    public static function indexBy(const array arr, key) -> array
    {
        var v;
        array res = [];

        for v in arr {
            if isset(v[key]) {
                let res[v[key]] = v;
            }
        }

        return res;
    }


    /**
    *   Merge 2 arrays. This add 2 arrays together
    */
    public static function merge(const array arr1, const array arr2) -> array
    {
        var v;
        array res = [];

        for v in arr1 {
            let res[] = v;
        }

        for v in arr2 {
            let res[] = v;
        }

        return res;
    }


    /**
    *   Merge 2 arrays associative. The 2nd array will overwrite the 1st array key if exists
    */
    public static function amerge(const array arr1, const array arr2) -> array
    {
        return arr1 + arr2;
    }


    /**
    *   Convert array to object recursively
    */
    public static function toObject(const array arr) -> object
    {
        var k, v, obj;

        let obj = new \stdClass;

        for k, v in arr {
            let
                k = (string)k,
                obj->{k} = is_array(v) ? self::toObject(v) : v;
        }

        return obj;
    }

    /**
    *   Check if int is in array.
    *   Note if use string, native in_array perform better
    */
    public static function inArrayInt(const int number, const array arr) -> boolean
    {
        var v;

        for v in arr {
            if (v === number) {
                return true;
            }
        }

        return false;
    }


    /**
    *   Get max value
    */
    public static function max(const array arr) -> int
    {
        int max;
        var v;

        for v in arr {
            if (v > max || !max) {
                let max = v;
            }
        }

        return max;
    }

    /**
    *   Get min value
    */
    public static function min(const array arr) -> int
    {
        int min;
        var v;

        for v in arr {
            if (v < min || !min) {
                let min = v;
            }
        }

        return min;
    }


    /**
    *   Get sum value
    */
    public static function sum(const array arr) -> int
    {
        int sum = 0;
        var v;

        for v in arr {
            let sum = sum + v;
        }

        return sum;
    }
}
