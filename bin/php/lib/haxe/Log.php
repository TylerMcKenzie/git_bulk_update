<?php
/**
 * Generated by Haxe 3.4.7
 */

namespace haxe;

use \php\Boot;

class Log {
	/**
	 * @var \Closure
	 */
	static public $trace;




	/**
	 * @internal
	 * @access private
	 */
	static public function __hx__init ()
	{
		static $called = false;
		if ($called) return;
		$called = true;


self::$trace = function ($v, $infos = null) {
	#/usr/share/haxe/std/haxe/Log.hx:66: characters 3-27
	Boot::trace($v, $infos);
};
	}
}


Boot::registerClass(Log::class, 'haxe.Log');
Log::__hx__init();
