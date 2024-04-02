<?php
/**
 * Generated by Haxe 4.3.4
 */

namespace php\_Boot;

use \php\Boot;

/**
 * For Dynamic access which looks like String.
 * Instances of this class should not be saved anywhere.
 * Instead it should be used to immediately invoke a String field right after instance creation one time only.
 */
class HxDynamicStr extends HxClosure {
	/**
	 * @var string
	 */
	static public $hxString;

	/**
	 * @param string $str
	 * @param string $method
	 * @param array $args
	 * 
	 * @return mixed
	 */
	public static function invoke ($str, $method, $args) {
		#/usr/share/haxe/std/php/Boot.hx:890: characters 3-34
		\array_unshift($args, $str);
		#/usr/share/haxe/std/php/Boot.hx:891: characters 3-69
		return \call_user_func_array((HxDynamicStr::$hxString??'null') . "::" . ($method??'null'), $args);
	}

	/**
	 * Returns HxDynamicStr instance if `value` is a string.
	 * Otherwise returns `value` as-is.
	 * 
	 * @param mixed $value
	 * 
	 * @return mixed
	 */
	public static function wrap ($value) {
		#/usr/share/haxe/std/php/Boot.hx:882: lines 882-886
		if (\is_string($value)) {
			#/usr/share/haxe/std/php/Boot.hx:883: characters 4-34
			return new HxDynamicStr($value);
		} else {
			#/usr/share/haxe/std/php/Boot.hx:885: characters 4-16
			return $value;
		}
	}

	/**
	 * @param string $str
	 * 
	 * @return void
	 */
	public function __construct ($str) {
		#/usr/share/haxe/std/php/Boot.hx:895: characters 3-19
		parent::__construct($str, null);
	}

	/**
	 * @param string $method
	 * @param array $args
	 * 
	 * @return mixed
	 */
	public function __call ($method, $args) {
		#/usr/share/haxe/std/php/Boot.hx:911: characters 10-38
		\array_unshift($args, $this->target);
		return \call_user_func_array((HxDynamicStr::$hxString??'null') . "::" . ($method??'null'), $args);
	}

	/**
	 * @param string $field
	 * 
	 * @return mixed
	 */
	public function __get ($field) {
		#/usr/share/haxe/std/php/Boot.hx:900: lines 900-906
		if ($field === "length") {
			#/usr/share/haxe/std/php/Boot.hx:902: characters 5-36
			return mb_strlen($this->target);
		} else {
			#/usr/share/haxe/std/php/Boot.hx:904: characters 5-17
			$this->func = $field;
			#/usr/share/haxe/std/php/Boot.hx:905: characters 5-16
			return $this;
		}
	}

	/**
	 * @see http://php.net/manual/en/language.oop5.magic.php#object.invoke
	 * 
	 * @return mixed
	 */
	public function __invoke () {
		#/usr/share/haxe/std/php/Boot.hx:919: characters 10-54
		$str = $this->target;
		$method = $this->func;
		$args = \func_get_args();
		\array_unshift($args, $str);
		return \call_user_func_array((HxDynamicStr::$hxString??'null') . "::" . ($method??'null'), $args);
	}

	/**
	 * Invoke this closure with `newThis` instead of `this`
	 * 
	 * @param mixed $newThis
	 * @param array $args
	 * 
	 * @return mixed
	 */
	public function callWith ($newThis, $args) {
		#/usr/share/haxe/std/php/Boot.hx:936: lines 936-938
		if ($newThis === null) {
			#/usr/share/haxe/std/php/Boot.hx:937: characters 4-20
			$newThis = $this->target;
		}
		#/usr/share/haxe/std/php/Boot.hx:939: characters 10-37
		$method = $this->func;
		\array_unshift($args, $newThis);
		return \call_user_func_array((HxDynamicStr::$hxString??'null') . "::" . ($method??'null'), $args);
	}

	/**
	 * Generates callable value for PHP
	 * 
	 * @param mixed $eThis
	 * 
	 * @return mixed[]
	 */
	public function getCallback ($eThis = null) {
		#/usr/share/haxe/std/php/Boot.hx:926: lines 926-928
		if ($eThis === null) {
			#/usr/share/haxe/std/php/Boot.hx:927: characters 4-51
			return [$this, $this->func];
		}
		#/usr/share/haxe/std/php/Boot.hx:929: characters 3-69
		return [new HxDynamicStr($eThis), $this->func];
	}

	/**
	 * @internal
	 * @access private
	 */
	static public function __hx__init ()
	{
		static $called = false;
		if ($called) return;
		$called = true;


		self::$hxString = Boot::getClass(HxString::class)->phpClassName;
	}
}

Boot::registerClass(HxDynamicStr::class, 'php._Boot.HxDynamicStr');
HxDynamicStr::__hx__init();
