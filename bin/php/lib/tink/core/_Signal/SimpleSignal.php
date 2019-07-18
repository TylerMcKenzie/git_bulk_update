<?php
/**
 * Generated by Haxe 3.4.7
 */

namespace tink\core\_Signal;

use \tink\core\SignalObject;
use \php\Boot;
use \tink\core\LinkObject;

class SimpleSignal implements SignalObject {
	/**
	 * @var \Closure
	 */
	public $f;


	/**
	 * @param \Closure $f
	 * 
	 * @return void
	 */
	public function __construct ($f) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Signal.hx:150: characters 32-42
		$this->f = $f;
	}


	/**
	 * @param \Closure $cb
	 * 
	 * @return LinkObject
	 */
	public function handle ($cb) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Signal.hx:151: characters 36-53
		return ($this->f)($cb);
	}
}


Boot::registerClass(SimpleSignal::class, 'tink.core._Signal.SimpleSignal');
