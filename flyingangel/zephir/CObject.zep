namespace Flyingangel\Zephir;

class CObject
{


    /**
    *   Merge 2 arrays. This add 2 arrays together
    */
    public static function merge(object obj1, object obj2) -> object
    {
        var res;

        let
            obj1 = get_object_vars(obj1),
            obj2 = get_object_vars(obj2),
            res = CArray::amerge(obj1, obj2),
            res = (object) res;

        return res;
    }


    /**
    *   Convert object to array recursively
    */
    public static function toArray(object obj) -> array
    {
        var k, v;

        let obj = get_object_vars(obj);

        for k, v in obj {
            let obj[k] = is_object(v) ? self::toArray(v) : v;
        }

        return obj;
    }


    /**
    * Index an array object by a chosen key
    */
    public static function indexBy(const array arr, const key) -> array
    {
        var v;
        array res = [];

        for v in arr {
            if isset(v->{key}) {
                let res[v->{key}] = v;
            }
        }

        return res;
    }

}