<?php
/**
 * Generated by Haxe 3.4.7
 */

use \sys\io\FileInput;
use \php\Boot;
use \haxe\io\Input;
use \php\_Boot\HxString;

/**
 * This class gives you access to many base functionalities of system platforms. Looks in `sys` sub packages for more system APIs.
 */
class Sys {
	/**
	 * @var string
	 */
	static public $_programPath;


	/**
	 * Returns all the arguments that were passed by the command line.
	 * 
	 * @return \Array_hx
	 */
	static public function args () {
		#/usr/share/haxe/std/php7/_std/Sys.hx:39: lines 39-43
		if (array_key_exists("argv", $_SERVER)) {
			#/usr/share/haxe/std/php7/_std/Sys.hx:40: characters 3-88
			return \Array_hx::wrap(array_slice($_SERVER["argv"], 1));
		} else {
			#/usr/share/haxe/std/php7/_std/Sys.hx:42: characters 3-12
			return new \Array_hx();
		}
	}


	/**
	 * Read a single input character from the standard input (without blocking) and returns it. Setting `echo` to true will also display it on the output.
	 * 
	 * @param bool $echo
	 * 
	 * @return int
	 */
	static public function getChar ($echo) {
		#/usr/share/haxe/std/php7/_std/Sys.hx:139: characters 2-36
		$c = fgetc(STDIN);
		#/usr/share/haxe/std/php7/_std/Sys.hx:140: lines 140-145
		if ($c === false) {
			#/usr/share/haxe/std/php7/_std/Sys.hx:141: characters 3-11
			return 0;
		} else {
			#/usr/share/haxe/std/php7/_std/Sys.hx:143: characters 3-26
			if ($echo) {
				#/usr/share/haxe/std/php7/_std/Sys.hx:143: characters 12-26
				echo($c);
			}
			#/usr/share/haxe/std/php7/_std/Sys.hx:144: characters 3-23
			return ord($c);
		}
	}


	/**
	 * Print any value on the standard output, followed by a newline.
	 * 
	 * @param mixed $v
	 * 
	 * @return void
	 */
	static public function println ($v) {
		#/usr/share/haxe/std/php7/_std/Sys.hx:34: characters 2-10
		echo(\Std::string($v));
		#/usr/share/haxe/std/php7/_std/Sys.hx:35: characters 2-13
		echo("\x0A");
	}


	/**
	 * Returns the absolute path to the current program file that we are running.
	 * Concretely, for an executable binary, it returns the path to the binary.
	 * For a script (e.g. a PHP file), it returns the path to the script.
	 * 
	 * @return string
	 */
	static public function programPath () {
		#/usr/share/haxe/std/php7/_std/Sys.hx:116: characters 2-21
		return Sys::$_programPath;
	}


	/**
	 * Returns the process standard input, from which you can read what user enters. Usually it will block until the user send a full input line. See `getChar` for an alternative.
	 * 
	 * @return Input
	 */
	static public function stdin () {
		#/usr/share/haxe/std/php7/_std/Sys.hx:124: characters 2-83
		$p = (defined("STDIN") ? STDIN : fopen("php://stdin", "r"));
		#/usr/share/haxe/std/php7/_std/Sys.hx:125: characters 2-41
		return new FileInput($p);
	}


	/**
	 * Returns the name of the system you are running on. For instance :
	 * "Windows", "Linux", "BSD" and "Mac" depending on your desktop OS.
	 * 
	 * @return string
	 */
	static public function systemName () {
		#/usr/share/haxe/std/php7/_std/Sys.hx:75: characters 2-32
		$s = php_uname("s");
		#/usr/share/haxe/std/php7/_std/Sys.hx:76: characters 2-25
		$p = HxString::indexOf($s, " ");
		#/usr/share/haxe/std/php7/_std/Sys.hx:77: characters 9-38
		if ($p >= 0) {
			#/usr/share/haxe/std/php7/_std/Sys.hx:77: characters 19-33
			return HxString::substr($s, 0, $p);
		} else {
			#/usr/share/haxe/std/php7/_std/Sys.hx:77: characters 36-37
			return $s;
		}
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


self::$_programPath = (realpath($_SERVER["SCRIPT_FILENAME"]) ?: null);
	}
}


Boot::registerClass(Sys::class, 'Sys');
Sys::__hx__init();
