<?php
/**
 * Generated by Haxe 3.4.7
 */

namespace tink\core;

use \php\Boot;
use \tink\core\_Callback\CallbackList_Impl_;

class SignalTrigger implements SignalObject {
	/**
	 * @var \Array_hx
	 */
	public $handlers;


	/**
	 * @return void
	 */
	public function __construct () {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Signal.hx:188: characters 17-38
		$this1 = new \Array_hx();
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Signal.hx:188: characters 17-38
		$this->handlers = $this1;
	}


	/**
	 * @return SignalObject
	 */
	public function asSignal () {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Signal.hx:213: characters 4-15
		return $this;
	}


	/**
	 *  Clear all handlers
	 * 
	 * @return void
	 */
	public function clear () {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Signal.hx:210: characters 4-20
		CallbackList_Impl_::clear($this->handlers);
	}


	/**
	 *  Gets the number of handlers registered
	 * 
	 * @return int
	 */
	public function getLength () {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Signal.hx:201: characters 11-26
		return $this->handlers->length;
	}


	/**
	 * @param \Closure $cb
	 * 
	 * @return LinkObject
	 */
	public function handle ($cb) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Signal.hx:204: characters 4-27
		return CallbackList_Impl_::add($this->handlers, $cb);
	}


	/**
	 *  Emits a value for this signal
	 * 
	 * @param mixed $event
	 * 
	 * @return void
	 */
	public function trigger ($event) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Signal.hx:195: characters 4-26
		CallbackList_Impl_::invoke($this->handlers, $event);
	}
}


Boot::registerClass(SignalTrigger::class, 'tink.core.SignalTrigger');
