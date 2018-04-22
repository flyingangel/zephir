namespace Flyingangel\Zephir;

class CString
{

	public static map = [
		"À": "A", "Á" : "A", "Â" : "A", "Ã" : "A", "Ä" : "A", "Å" : "A","Ă" : "A", "Æ" : "AE", "Ç" :
		"C", "È" : "E", "É" : "E", "Ê" : "E", "Ë" : "E", "Ì" : "I", "Í" : "I", "Î" : "I",
		"Ï" : "I", "Ð" : "D", "Ñ" : "N", "Ò" : "O", "Ó" : "O", "Ô" : "O", "Õ" : "O", "Ö" :
		"O", "Ő" : "O", "Ø" : "O","Ș" : "S","Ț" : "T", "Ù" : "U", "Ú" : "U", "Û" : "U", "Ü" : "U", "Ű" : "U",
		"Ý" : "Y", "Þ" : "TH", "ß" : "ss", "à" : "a", "á" : "a", "â" : "a", "ã" : "a", "ä" :
		"a", "å" : "a", "ă" : "a", "æ" : "ae", "ç" : "c", "è" : "e", "é" : "e", "ê" : "e", "ë" : "e",
		"ì" : "i", "í" : "i", "î" : "i", "ï" : "i", "ð" : "d", "ñ" : "n", "ò" : "o", "ó" :
		"o", "ô" : "o", "õ" : "o", "ö" : "o", "ő" : "o", "ø" : "o", "ș" : "s", "ț" : "t", "ù" : "u", "ú" : "u",
		"û" : "u", "ü" : "u", "ű" : "u", "ý" : "y", "þ" : "th", "ÿ" : "y"
	];

	/**
	*	Convert a string to camel case
	*/
	public static function camelize(string str, const boolean capitalizeFirstCharacter = false) -> string
	{
		let
		str = preg_replace("/\W/", "_", str),
		str = str->camelize();

		if !capitalizeFirstCharacter {
			let str = lcfirst(str);
		}

		return str;
	}


	/**
    * Generate a "random" alpha-numeric string.
    */
	public static function random(const int length) -> string
	{
		var bytes = openssl_random_pseudo_bytes(length * 2);
		return substr(str_replace(['/', '+', '='], "", base64_encode(bytes)), 0, length);
	}

    /**
     * Converts all accent characters to ASCII characters.
     */
    public static function removeAccents(string str) -> string
    {
    	string search;
    	array complexSearch, complexReplace;

    	//nothing to do
    	if !preg_match("/[\x80-\xff]/", str) {
    		return str;
    	}

    	let
    	str = str_replace(array_keys(self::map), array_values(self::map), str),

        //ISO-8859-1
    	search  = "\x80\x83\x8a\x8e\x9a\x9e\x9f\xa2\xa5\xb5\xc0\xc1\xc2\xc3\xc4\xc5\xc7\xc8\xc9\xca\xcb\xcc\xcd",
    	search .= "\xce\xcf\xd1\xd2\xd3\xd4\xd5\xd6\xd8\xd9\xda\xdb\xdc\xdd\xe0\xe1\xe2\xe3\xe4\xe5\xe7\xe8\xe9",
    	search .= "\xea\xeb\xec\xed\xee\xef\xf1\xf2\xf3\xf4\xf5\xf6\xf8\xf9\xfa\xfb\xfc\xfd\xff",
    	str    = strtr(str, search, "EfSZszYcYuAAAAAACEEEEIIIINOOOOOOUUUUYaaaaaaceeeeiiiinoooooouuuuyy"),

        //2 characters
    	complexSearch  = ["\x8c", "\x9c", "\xc6", "\xd0", "\xde", "\xdf", "\xe6", "\xf0", "\xfe"],
    	complexReplace = ["OE", "oe", "AE", "DH", "TH", "ss", "ae", "dh", "th"],
    	str           = str_replace(complexSearch, complexReplace, str);

    	return str;
    }

    /**
     * Remove all whitespaces
     */
    public static function removeWhitespaces(const string str) -> string
    {
    	return preg_replace("/\s+/", "", str);
    }

    public static function removePunctuation(const string str) -> string
    {
    	return preg_replace("/[\W|_]+/", "", str);
    }

    /**
     * Sanitize a string. Ex: There's a cat! => theresacat
     */
    public static function sanitize(string str) -> string
    {
    	let
    	str = strtolower(str),
    	str = self::removePunctuation(str),
    	str = self::removeWhitespaces(str),
    	str = self::removeAccents(str);

    	return str;
    }

    /**
    *	Test if string starts with a substring
    */
    public static function startsWith(const string haystack, const string needle) -> boolean
    {
    	return needle !== "" || strrpos(haystack, needle, -strlen(haystack)) !== false;
    }


    /**
    *	Test if string contains a substring
    */
    public static function contains(const string haystack, const string needle) -> boolean
    {
    	return needle !== "" && strpos(haystack, needle) !== false;
    }

    /**
    *	Test if string ends with a substring
    */
    public static function endsWith(const string haystack, const string needle) -> boolean
    {
    	int length = strlen(needle);
    	int hayLast = strlen(haystack) - 1;
    	return haystack[hayLast] === needle[length - 1] ? needle !== "" && needle === substr(haystack, -strlen(needle)) : false;
    }

    /**
    * Check if a string is an IP.
    */
    public static function isIp(const string str) -> boolean
    {
    	return filter_var(str, FILTER_VALIDATE_IP) !== false;
    }

    /**
    * Check if a string is an email.
    */
    public static function isEmail(const string str) -> boolean
    {
    	return filter_var(str, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
    * Check if a string is an url.
    */
    public static function isUrl(const string str) -> boolean
    {
    	return filter_var(str, FILTER_VALIDATE_URL) !== false;
    }

}