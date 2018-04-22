namespace Flyingangel\Zephir;

class CSingleton {

    private static instance;

    public static function i() {

        if !self::instance {
            string className = get_called_class();
            let self::instance = new {className};
        }

        return self::instance;
    }
}