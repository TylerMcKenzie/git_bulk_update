<?php
/**
 * Generated by Haxe 3.4.7
 */

namespace sys\io\_Process;

use \haxe\io\Output;
use \php\Boot;
use \haxe\io\Bytes;

class WritablePipe extends Output {
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
		#/usr/share/haxe/std/php7/_std/sys/io/Process.hx:78: characters 2-18
		$this->pipe = $pipe;
		#/usr/share/haxe/std/php7/_std/sys/io/Process.hx:79: characters 2-27
		$this->tmpBytes = Bytes::alloc(1);
	}
}


Boot::registerClass(WritablePipe::class, 'sys.io._Process.WritablePipe');
