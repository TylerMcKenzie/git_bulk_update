<?php
/**
 * Generated by Haxe 3.4.7
 */

namespace haxe\io;

use \php\Boot;

/**
 * This exception is raised when reading while data is no longer available in the `haxe.io.Input`.
 */
class Eof {
	/**
	 * @return void
	 */
	public function __construct () {
	}


	/**
	 * @return string
	 */
	public function toString () {
		#/usr/share/haxe/std/haxe/io/Eof.hx:31: characters 2-14
		return "Eof";
	}


	public function __toString() {
		return $this->toString();
	}
}


Boot::registerClass(Eof::class, 'haxe.io.Eof');
