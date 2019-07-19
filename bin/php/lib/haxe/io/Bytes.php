<?php
/**
 * Generated by Haxe 3.4.7
 */

namespace haxe\io;

use \php\Boot;
use \haxe\io\_BytesData\Container;

class Bytes {
	/**
	 * @var Container
	 */
	public $b;
	/**
	 * @var int
	 */
	public $length;


	/**
	 * @param int $length
	 * 
	 * @return Bytes
	 */
	static public function alloc ($length) {
		#/usr/share/haxe/std/php7/_std/haxe/io/Bytes.hx:187: characters 2-51
		return new Bytes($length, new Container(str_repeat(chr(0), $length)));
	}


	/**
	 * @param int $length
	 * @param Container $b
	 * 
	 * @return void
	 */
	public function __construct ($length, $b) {
		#/usr/share/haxe/std/php7/_std/haxe/io/Bytes.hx:31: characters 2-22
		$this->length = $length;
		#/usr/share/haxe/std/php7/_std/haxe/io/Bytes.hx:32: characters 2-12
		$this->b = $b;
	}


	/**
	 * @return string
	 */
	public function toString () {
		#/usr/share/haxe/std/php7/_std/haxe/io/Bytes.hx:165: characters 2-10
		return $this->b->s;
	}


	public function __toString() {
		return $this->toString();
	}
}


Boot::registerClass(Bytes::class, 'haxe.io.Bytes');
