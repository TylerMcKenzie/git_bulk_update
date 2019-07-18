<?php
/**
 * Generated by Haxe 3.4.7
 */

namespace tink\core\_Signal;

use \tink\core\SignalObject;
use \php\_Boot\HxClosure;
use \tink\core\_Callback\SimpleLink;
use \tink\core\SignalTrigger;
use \php\Boot;
use \tink\core\_Callback\LinkPair;
use \tink\core\LinkObject;
use \tink\core\_Callback\CallbackList_Impl_;

class Suspendable implements SignalObject {
	/**
	 * @var \Closure
	 */
	public $activate;
	/**
	 * @var LinkObject
	 */
	public $check;
	/**
	 * @var bool
	 */
	public $killed;
	/**
	 * @var \Closure
	 */
	public $suspend;
	/**
	 * @var SignalTrigger
	 */
	public $trigger;


	/**
	 * @param \Closure $activate
	 * 
	 * @return void
	 */
	public function __construct ($activate) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Signal.hx:160: characters 42-47
		$this->killed = false;
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Signal.hx:155: characters 33-52
		$this->trigger = new SignalTrigger();
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Signal.hx:169: characters 4-28
		$this->activate = $activate;
	}


	/**
	 * @param \Closure $cb
	 * 
	 * @return LinkObject
	 */
	public function handle ($cb) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Signal.hx:172: lines 172-184
		$_gthis = $this;
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Signal.hx:173: characters 4-27
		if ($this->killed) {
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Signal.hx:173: characters 16-27
			return null;
		}
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Signal.hx:174: lines 174-175
		if ($this->trigger->handlers->length === 0) {
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Signal.hx:175: characters 6-46
			$this->suspend = ($this->activate)(new HxClosure($this->trigger, 'trigger'));
		}
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Signal.hx:178: lines 178-183
		$a = CallbackList_Impl_::add($this->trigger->handlers, $cb);
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Signal.hx:178: lines 178-183
		$this1 = new SimpleLink(function ()  use (&$_gthis) {
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Signal.hx:180: lines 180-183
			if ($_gthis->trigger->handlers->length === 0) {
				#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Signal.hx:181: characters 12-21
				($_gthis->suspend)();
				#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Signal.hx:182: characters 12-26
				$_gthis->suspend = null;
			}
		});
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Signal.hx:178: lines 178-183
		return new LinkPair($a, $this1);
	}


	/**
	 * @return void
	 */
	public function kill () {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Signal.hx:163: lines 163-166
		if (!$this->killed) {
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Signal.hx:164: characters 6-19
			$this->killed = true;
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Signal.hx:165: characters 6-20
			$this->trigger = null;
		}
	}
}


Boot::registerClass(Suspendable::class, 'tink.core._Signal.Suspendable');
