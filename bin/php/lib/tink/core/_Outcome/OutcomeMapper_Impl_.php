<?php
/**
 * Generated by Haxe 3.4.7
 */

namespace tink\core\_Outcome;

use \tink\core\Outcome;
use \php\Boot;
use \haxe\ds\Either;
use \php\_Boot\HxAnon;

final class OutcomeMapper_Impl_ {
	/**
	 * @param \Closure $f
	 * 
	 * @return object
	 */
	static public function _new ($f) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Outcome.hx:150: character 2
		$this1 = new HxAnon([
			"f" => $f,
		]);
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Outcome.hx:150: character 2
		return $this1;
	}


	/**
	 * @param object $this
	 * @param Outcome $o
	 * 
	 * @return Outcome
	 */
	static public function apply ($this1, $o) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Outcome.hx:152: characters 4-20
		return $this1->f($o);
	}


	/**
	 * @param \Closure $f
	 * 
	 * @return object
	 */
	static public function withEitherError ($f) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Outcome.hx:164: lines 164-173
		return OutcomeMapper_Impl_::_new(function ($o)  use (&$f) {
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Outcome.hx:165: lines 165-172
			switch (Boot::dynamicField($o, 'index')) {
				case 0:
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Outcome.hx:166: characters 21-22
					$d = $o->params[0];
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Outcome.hx:167: characters 17-21
					$_g = $f($d);
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Outcome.hx:167: characters 17-21
					switch (Boot::dynamicField($_g, 'index')) {
						case 0:
							#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Outcome.hx:168: characters 25-26
							$d1 = $_g->params[0];
							#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Outcome.hx:168: characters 29-39
							return Outcome::Success($d1);
							break;
						case 1:
							#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Outcome.hx:169: characters 25-26
							$f1 = $_g->params[0];
							#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Outcome.hx:169: characters 29-46
							return Outcome::Failure(Either::Right($f1));
							break;
					}
					break;
				case 1:
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Outcome.hx:171: characters 21-22
					$f2 = $o->params[0];
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Outcome.hx:171: characters 25-41
					return Outcome::Failure(Either::Left($f2));
					break;
			}
		});
	}


	/**
	 * @param \Closure $f
	 * 
	 * @return object
	 */
	static public function withSameError ($f) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Outcome.hx:155: lines 155-160
		return OutcomeMapper_Impl_::_new(function ($o)  use (&$f) {
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Outcome.hx:156: lines 156-159
			switch (Boot::dynamicField($o, 'index')) {
				case 0:
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Outcome.hx:157: characters 21-22
					$d = $o->params[0];
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Outcome.hx:157: characters 25-29
					return $f($d);
					break;
				case 1:
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Outcome.hx:158: characters 21-22
					$f1 = $o->params[0];
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Outcome.hx:158: characters 25-35
					return Outcome::Failure($f1);
					break;
			}
		});
	}
}


Boot::registerClass(OutcomeMapper_Impl_::class, 'tink.core._Outcome.OutcomeMapper_Impl_');
