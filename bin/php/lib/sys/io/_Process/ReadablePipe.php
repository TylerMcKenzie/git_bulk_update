<?php
/**
 * Generated by Haxe 3.4.7
 */

namespace sys\io\_Process;

use \haxe\io\Eof;
use \php\Boot;
use \php\_Boot\HxException;
use \haxe\io\Input;
use \haxe\io\Bytes;
use \haxe\io\_BytesData\Container;
use \haxe\io\Error;

class ReadablePipe extends Input {
	/**
	 * @var mixed
	 */
	public $pipe;
	/**
	 * @var Bytes
	 */
	public $tmpBytes;


	/**
	 * @param mixed $pipe
	 * 
	 * @return void
	 */
	public function __construct ($pipe) {
		#/usr/share/haxe/std/php7/_std/sys/io/Process.hx:46: characters 2-18
		$this->pipe = $pipe;
		#/usr/share/haxe/std/php7/_std/sys/io/Process.hx:47: characters 2-27
		$this->tmpBytes = Bytes::alloc(1);
	}


	/**
	 * @return int
	 */
	public function readByte () {
		#/usr/share/haxe/std/php7/_std/sys/io/Process.hx:55: characters 2-43
		if ($this->readBytes($this->tmpBytes, 0, 1) === 0) {
			#/usr/share/haxe/std/php7/_std/sys/io/Process.hx:55: characters 38-43
			throw new HxException(Error::Blocked());
		}
		#/usr/share/haxe/std/php7/_std/sys/io/Process.hx:56: characters 9-24
		return ord($this->tmpBytes->b->s[0]);
	}


	/**
	 * @param Bytes $s
	 * @param int $pos
	 * @param int $len
	 * 
	 * @return int
	 */
	public function readBytes ($s, $pos, $len) {
		#/usr/share/haxe/std/php7/_std/sys/io/Process.hx:60: characters 2-23
		if (feof($this->pipe)) {
			#/usr/share/haxe/std/php7/_std/sys/io/Process.hx:60: characters 18-23
			throw new HxException(new Eof());
		}
		#/usr/share/haxe/std/php7/_std/sys/io/Process.hx:62: characters 2-31
		$result = fread($this->pipe, $len);
		#/usr/share/haxe/std/php7/_std/sys/io/Process.hx:63: characters 2-24
		if ($result === "") {
			#/usr/share/haxe/std/php7/_std/sys/io/Process.hx:63: characters 19-24
			throw new HxException(new Eof());
		}
		#/usr/share/haxe/std/php7/_std/sys/io/Process.hx:64: characters 2-34
		if ($result === false) {
			#/usr/share/haxe/std/php7/_std/sys/io/Process.hx:64: characters 29-34
			throw new HxException(Error::Custom("Failed to read process output"));
		}
		#/usr/share/haxe/std/php7/_std/sys/io/Process.hx:65: characters 2-29
		$result1 = $result;
		#/usr/share/haxe/std/php7/_std/sys/io/Process.hx:67: characters 14-36
		$result2 = strlen($result1);
		#/usr/share/haxe/std/php7/_std/sys/io/Process.hx:67: characters 2-37
		$bytes = new Bytes($result2, new Container($result1));
		#/usr/share/haxe/std/php7/_std/sys/io/Process.hx:68: characters 2-38
		$len1 = strlen($result1);
		#/usr/share/haxe/std/php7/_std/sys/io/Process.hx:68: characters 2-38
		if (($pos < 0) || ($len1 < 0) || (($pos + $len1) > $s->length) || ($len1 > $bytes->length)) {
			#/usr/share/haxe/std/php7/_std/sys/io/Process.hx:68: characters 2-38
			throw new HxException(Error::OutsideBounds());
		} else {
			#/usr/share/haxe/std/php7/_std/sys/io/Process.hx:68: characters 2-38
			$this1 = $s->b;
			#/usr/share/haxe/std/php7/_std/sys/io/Process.hx:68: characters 2-38
			$src = $bytes->b;
			#/usr/share/haxe/std/php7/_std/sys/io/Process.hx:68: characters 2-38
			$this1->s = ((substr($this1->s, 0, $pos) . substr($src->s, 0, $len1)) . substr($this1->s, $pos + $len1));
		}

		#/usr/share/haxe/std/php7/_std/sys/io/Process.hx:69: characters 2-22
		return strlen($result1);
	}
}


Boot::registerClass(ReadablePipe::class, 'sys.io._Process.ReadablePipe');
