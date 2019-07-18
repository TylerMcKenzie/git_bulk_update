<?php
/**
 * Generated by Haxe 3.4.7
 */

namespace tink\core\_Promise;

use \php\_Boot\HxClosure;
use \tink\core\FutureTrigger;
use \tink\core\OutcomeTools;
use \tink\core\Outcome;
use \php\Boot;
use \tink\core\TypedError;
use \tink\core\_Future\FutureObject;
use \tink\core\_Future\SyncFuture;
use \tink\core\MPair;
use \tink\core\_Future\Future_Impl_;
use \tink\core\Noise;
use \tink\core\_Lazy\LazyObject;
use \tink\core\_Callback\CallbackLink_Impl_;
use \tink\core\LinkObject;
use \php\_Boot\HxAnon;
use \tink\core\_Lazy\LazyConst;

final class Promise_Impl_ {
	/**
	 * @var FutureObject
	 */
	static public $NEVER;
	/**
	 * @var FutureObject
	 */
	static public $NOISE;
	/**
	 * @var FutureObject
	 */
	static public $NULL;


	/**
	 * @param \Closure $f
	 * @param bool $lazy
	 * 
	 * @return FutureObject
	 */
	static public function _new ($f, $lazy = false) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:15: character 16
		if ($lazy === null) {
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:15: character 16
			$lazy = false;
		}
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:15: character 16
		$this1 = Future_Impl_::async(function ($cb)  use (&$f) {
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:17: characters 6-63
			$f(function ($v)  use (&$cb) {
				#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:17: characters 20-34
				$cb(Outcome::Success($v));
			}, function ($e)  use (&$cb) {
				#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:17: characters 48-62
				$cb(Outcome::Failure($e));
			});
		}, $lazy);
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:15: character 16
		return $this1;
	}


	/**
	 * @param FutureObject $a
	 * @param FutureObject $b
	 * 
	 * @return FutureObject
	 */
	static public function and ($a, $b) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:73: characters 4-60
		return Promise_Impl_::merge($a, $b, function ($a1, $b1) {
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:73: characters 45-59
			$this1 = new MPair($a1, $b1);
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:73: characters 38-59
			return Promise_Impl_::ofOutcome(Outcome::Success($this1));
		});
	}


	/**
	 * @param \Closure $gen
	 * 
	 * @return \Closure
	 */
	static public function cache ($gen) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:262: characters 4-17
		$p = null;
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:263: lines 263-280
		return function ()  use (&$gen, &$p) {
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:264: characters 6-18
			$ret = $p;
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:265: lines 265-275
			if ($ret === null) {
				#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:266: characters 8-25
				$sync = false;
				#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:267: lines 267-273
				$ret = Promise_Impl_::next($gen(), function ($o)  use (&$sync, &$p) {
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:268: lines 268-271
					$o->b->handle(function ($_)  use (&$sync, &$p) {
						#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:269: characters 12-23
						$sync = true;
						#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:270: characters 12-20
						$p = null;
					});
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:272: characters 10-20
					return Promise_Impl_::ofOutcome(Outcome::Success($o->a));
				});
				#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:274: characters 8-25
				if (!$sync) {
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:274: characters 18-25
					$p = $ret;
				}
			}
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:276: lines 276-279
			$ret1 = $ret->map(function ($o1)  use (&$p) {
				#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:277: characters 8-35
				if (!OutcomeTools::isSuccess($o1)) {
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:277: characters 27-35
					$p = null;
				}
				#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:278: characters 8-16
				return $o1;
			});
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:276: lines 276-279
			return $ret1->gather();
		};
	}


	/**
	 * @param FutureObject $this
	 * 
	 * @return FutureObject
	 */
	static public function eager ($this1) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:22: characters 4-23
		return $this1->eager();
	}


	/**
	 * @param FutureObject $this
	 * @param \Closure $f
	 * 
	 * @return FutureObject
	 */
	static public function flatMap ($this1, $f) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:28: characters 11-26
		$ret = $this1->flatMap($f);
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:28: characters 11-26
		return $ret->gather();
	}


	/**
	 * @param FutureObject $this
	 * @param \Closure $cb
	 * 
	 * @return LinkObject
	 */
	static public function handle ($this1, $cb) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:49: characters 4-26
		return $this1->handle($cb);
	}


	/**
	 * @param \Array_hx $a
	 * @param int $concurrency
	 * @param bool $lazy
	 * 
	 * @return FutureObject
	 */
	static public function inParallel ($a, $concurrency = null, $lazy = null) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:192: lines 192-242
		if ($a->length === 0) {
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:192: characters 24-48
			return new SyncFuture(new LazyConst(Outcome::Success(new \Array_hx())));
		} else {
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:193: lines 193-242
			return Future_Impl_::async(function ($cb)  use (&$concurrency, &$a) {
				#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:194: lines 194-201
				$result = new \Array_hx();
				#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:194: lines 194-201
				$pending = $a->length;
				#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:194: lines 194-201
				$links = null;
				#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:194: lines 194-201
				$linkArray = new \Array_hx();
				#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:194: lines 194-201
				$sync = false;
				#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:194: lines 194-201
				$i = 0;
				#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:194: lines 194-201
				$iter = $a->iterator();
				#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:194: lines 194-201
				$next = null;
				#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:203: lines 203-207
				$done = function ($o)  use (&$sync, &$links, &$cb) {
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:204: lines 204-205
					if ($links === null) {
						#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:204: characters 29-40
						$sync = true;
					} else if ($links !== null) {
						#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:205: characters 15-29
						$links->cancel();
					}
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:206: characters 10-15
					$cb($o);
				};
				#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:209: lines 209-212
				$fail = function ($e)  use (&$pending, &$done) {
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:210: characters 10-21
					$pending = 0;
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:211: characters 10-26
					$done(Outcome::Failure($e));
				};
				#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:218: lines 218-224
				$set = function ($index, $value)  use (&$next, &$pending, &$iter, &$result, &$done) {
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:219: characters 10-31
					$result[$index] = $value;
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:220: characters 14-23
					$pending = $pending - 1;
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:220: lines 220-223
					if ($pending === 0) {
						#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:221: characters 12-33
						$done(Outcome::Success($result));
					} else if ($iter->hasNext() && ($pending > 0)) {
						#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:223: characters 12-18
						$next();
					}
				};
				#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:226: lines 226-232
				$next = function ()  use (&$set, &$fail, &$iter, &$i, &$linkArray) {
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:227: characters 22-25
					$i = $i + 1;
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:227: characters 10-26
					$index1 = $i - 1;
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:228: lines 228-231
					$x = $iter->next()->handle(function ($o1)  use (&$set, &$fail, &$index1) {
						#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:228: lines 228-231
						switch (Boot::dynamicField($o1, 'index')) {
							case 0:
								#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:229: characters 25-26
								$v = $o1->params[0];
								#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:229: characters 29-42
								$set($index1, $v);
								break;
							case 1:
								#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:230: characters 25-26
								$e1 = $o1->params[0];
								#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:230: characters 29-36
								$fail($e1);
								break;
						}
					});
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:228: lines 228-231
					$linkArray->arr[$linkArray->length] = $x;
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:228: lines 228-231
					++$linkArray->length;

				};
				#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:234: lines 234-236
				while (true) {
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:234: characters 14-69
					$tmp = null;
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:234: characters 14-69
					if ($iter->hasNext() && ($pending > 0)) {
						#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:234: characters 27-69
						if ($concurrency !== null) {
							#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:234: characters 51-64
							$concurrency = $concurrency - 1;
							#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:234: characters 14-69
							$tmp = ($concurrency + 1) > 0;
						} else {
							#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:234: characters 14-69
							$tmp = true;
						}
					} else {
						#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:234: characters 14-69
						$tmp = false;
					}
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:234: lines 234-236
					if (!$tmp) {
						#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:234: lines 234-236
						break;
					}
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:235: characters 10-16
					$next();
				}
				#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:238: characters 8-25
				$links = CallbackLink_Impl_::fromMany($linkArray);
				#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:240: lines 240-241
				if ($sync) {
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:241: characters 10-24
					if ($links !== null) {
						#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:241: characters 10-24
						$links->cancel();
					}
				}
			}, $lazy);
		}
	}


	/**
	 * @param \Array_hx $a
	 * 
	 * @return FutureObject
	 */
	static public function inSequence ($a) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:246: lines 246-254
		$loop = null;
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:246: lines 246-254
		$loop = function ($index)  use (&$loop, &$a) {
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:248: lines 248-254
			if ($index === $a->length) {
				#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:248: characters 31-33
				return Promise_Impl_::ofOutcome(Outcome::Success(new \Array_hx()));
			} else {
				#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:250: lines 250-254
				return Promise_Impl_::next(($a->arr[$index] ?? null), function ($head)  use (&$index, &$loop) {
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:251: lines 251-253
					return Promise_Impl_::next($loop($index + 1), function ($tail)  use (&$head) {
						#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:252: characters 30-56
						return Promise_Impl_::ofOutcome(Outcome::Success((\Array_hx::wrap([$head]))->concat($tail)));
					});
				});
			}
		};
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:246: lines 246-254
		$loop1 = $loop;
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:257: characters 4-18
		return $loop1(0);
	}


	/**
	 * @param FutureObject $this
	 * 
	 * @return FutureObject
	 */
	static public function isSuccess ($this1) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:55: characters 11-54
		$ret = $this1->map(function ($o) {
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:55: characters 33-53
			return OutcomeTools::isSuccess($o);
		});
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:55: characters 11-54
		return $ret->gather();
	}


	/**
	 * Given an Iterable (e.g. Array) of Promises, handle them one by one with the `yield` function until one of them yields `Some` value
	 * and the returned promise will resolve that value. If all of them yields `None`, the returned promise will resolve to the `fallback` promise.
	 * In a nutshell, it is the async version of the following code:
	 * ```haxe
	 * for(promise in promises) {
	 *   switch yield(promise) {
	 *     case Some(v): return v;
	 *     case None:
	 *   }
	 * }
	 * return fallback;
	 * ```
	 * @param promises An Iterable (e.g. Array) of Promises
	 * @param yield A function used to handle the promises and should return an Option
	 * @param fallback A value to be used when all yields `None`
	 * @return Promise<T>
	 * 
	 * @param object $promises
	 * @param \Closure $yield
	 * @param FutureObject $fallback
	 * @param bool $lazy
	 * 
	 * @return FutureObject
	 */
	static public function iterate ($promises, $yield, $fallback, $lazy = null) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:94: lines 94-112
		return Future_Impl_::async(function ($cb)  use (&$yield, &$fallback, &$promises) {
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:95: characters 6-37
			$iter = $promises->iterator();
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:96: lines 96-110
			$next = null;
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:96: lines 96-110
			$next = function ()  use (&$yield, &$next, &$iter, &$fallback, &$cb) {
				#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:97: lines 97-109
				if ($iter->hasNext()) {
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:98: lines 98-107
					$iter->next()->handle(function ($o)  use (&$yield, &$next, &$cb) {
						#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:98: lines 98-107
						switch (Boot::dynamicField($o, 'index')) {
							case 0:
								#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:99: characters 25-26
								$v = $o->params[0];
								#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:100: lines 100-104
								$yield($v)->handle(function ($o1)  use (&$next, &$cb) {
									#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:100: lines 100-104
									switch (Boot::dynamicField($o1, 'index')) {
										case 0:
											#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:100: characters 49-50
											switch (Boot::dynamicField($o1->params[0], 'index')) {
												case 0:
													#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:101: characters 34-37
													$ret = $o1->params[0]->params[0];
													#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:101: characters 41-57
													$cb(Outcome::Success($ret));
													break;
												case 1:
													#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:102: characters 36-42
													$next();
													break;
											}
											break;
										case 1:
											#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:103: characters 29-30
											$e = $o1->params[0];
											#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:103: characters 33-47
											$cb(Outcome::Failure($e));
											break;
									}
								});
								break;
							case 1:
								#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:105: characters 25-26
								$e1 = $o->params[0];
								#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:106: characters 14-28
								$cb(Outcome::Failure($e1));
								break;
						}
					});
				} else {
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:109: characters 10-29
					$fallback->handle($cb);
				}
			};
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:96: lines 96-110
			$next1 = $next;
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:111: characters 6-12
			$next1();
		}, $lazy);
	}


	/**
	 * @param LazyObject $p
	 * 
	 * @return FutureObject
	 */
	static public function lazy ($p) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:188: characters 4-62
		return Future_Impl_::async(function ($cb)  use (&$p) {
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:188: characters 37-55
			$p->get()->handle($cb);
		}, true);
	}


	/**
	 * @param FutureObject $p
	 * 
	 * @return FutureObject
	 */
	static public function lift ($p) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:286: characters 4-12
		return $p;
	}


	/**
	 * @param FutureObject $this
	 * @param \Closure $f
	 * 
	 * @return FutureObject
	 */
	static public function map ($this1, $f) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:25: characters 11-22
		$ret = $this1->map($f);
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:25: characters 11-22
		return $ret->gather();
	}


	/**
	 * @param FutureObject $this
	 * @param \Closure $f
	 * 
	 * @return FutureObject
	 */
	static public function mapError ($this1, $f) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:43: lines 43-46
		$ret = $this1->map(function ($o)  use (&$f) {
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:43: lines 43-46
			switch (Boot::dynamicField($o, 'index')) {
				case 0:
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:44: characters 23-24
					return $o;
					break;
				case 1:
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:45: characters 19-20
					$e = $o->params[0];
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:45: characters 23-36
					return Outcome::Failure($f($e));
					break;
			}
		});
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:43: lines 43-46
		return $ret->gather();
	}


	/**
	 * @param FutureObject $this
	 * @param FutureObject $other
	 * @param \Closure $merger
	 * @param bool $gather
	 * 
	 * @return FutureObject
	 */
	static public function merge ($this1, $other, $merger, $gather = true) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:70: characters 4-96
		if ($gather === null) {
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:70: characters 4-96
			$gather = true;
		}
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:70: characters 4-96
		return Promise_Impl_::next($this1, function ($t)  use (&$other, &$merger) {
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:70: characters 29-87
			return Promise_Impl_::next($other, function ($a)  use (&$t, &$merger) {
				#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:70: characters 60-79
				return $merger($t, $a);
			}, false);
		}, $gather);
	}


	/**
	 * @param FutureObject $this
	 * @param \Closure $f
	 * @param bool $gather
	 * 
	 * @return FutureObject
	 */
	static public function next ($this1, $f, $gather = true) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:58: lines 58-61
		if ($gather === null) {
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:58: lines 58-61
			$gather = true;
		}
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:58: lines 58-61
		$ret = $this1->flatMap(function ($o)  use (&$f) {
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:58: lines 58-61
			switch (Boot::dynamicField($o, 'index')) {
				case 0:
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:59: characters 21-22
					$d = $o->params[0];
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:59: characters 25-29
					return $f($d);
					break;
				case 1:
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:60: characters 21-22
					$f1 = $o->params[0];
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:60: characters 25-48
					return new SyncFuture(new LazyConst(Outcome::Failure($f1)));
					break;
			}
		});
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:58: lines 58-61
		if ($gather) {
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:58: lines 58-61
			return $ret->gather();
		} else {
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:58: lines 58-61
			return $ret;
		}
	}


	/**
	 * @param FutureObject $this
	 * 
	 * @return FutureObject
	 */
	static public function noise ($this1) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:52: characters 4-60
		return Promise_Impl_::next($this1, function ($v) {
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:52: characters 47-59
			return Promise_Impl_::ofOutcome(Outcome::Success(Noise::Noise()));
		});
	}


	/**
	 * @param mixed $d
	 * 
	 * @return FutureObject
	 */
	static public function ofData ($d) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:185: characters 4-32
		return Promise_Impl_::ofOutcome(Outcome::Success($d));
	}


	/**
	 * @param TypedError $e
	 * 
	 * @return FutureObject
	 */
	static public function ofError ($e) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:182: characters 4-32
		return Promise_Impl_::ofOutcome(Outcome::Failure($e));
	}


	/**
	 * @param FutureObject $f
	 * 
	 * @return FutureObject
	 */
	static public function ofFuture ($f) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:176: characters 11-25
		$ret = $f->map(new HxClosure(Outcome::class, 'Success'));
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:176: characters 11-25
		return $ret->gather();
	}


	/**
	 * @param Outcome $o
	 * 
	 * @return FutureObject
	 */
	static public function ofOutcome ($o) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:179: characters 4-25
		return new SyncFuture(new LazyConst($o));
	}


	/**
	 * @param FutureObject $s
	 * 
	 * @return FutureObject
	 */
	static public function ofSpecific ($s) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:173: characters 4-35
		return $s;
	}


	/**
	 * @param FutureObject $this
	 * @param \Closure $f
	 * 
	 * @return FutureObject
	 */
	static public function recover ($this1, $f) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:37: lines 37-40
		$ret = $this1->flatMap(function ($o)  use (&$f) {
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:37: lines 37-40
			switch (Boot::dynamicField($o, 'index')) {
				case 0:
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:38: characters 19-20
					$d = $o->params[0];
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:38: characters 23-37
					return new SyncFuture(new LazyConst($d));
					break;
				case 1:
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:39: characters 19-20
					$e = $o->params[0];
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:39: characters 23-27
					return $f($e);
					break;
			}
		});
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:37: lines 37-40
		return $ret->gather();
	}


	/**
	 * @param TypedError $e
	 * 
	 * @return FutureObject
	 */
	static public function reject ($e) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:301: characters 11-34
		return new SyncFuture(new LazyConst(Outcome::Failure($e)));
	}


	/**
	 * @param mixed $v
	 * 
	 * @return FutureObject
	 */
	static public function resolve ($v) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:297: characters 11-34
		return new SyncFuture(new LazyConst(Outcome::Success($v)));
	}


	/**
	 * Retry a promise generator repeatedly
	 *
	 * @param gen A function that returns a `Promise`, this function will be called multiple times during the retry process
	 * @param next A callback to be called when an attempt failed. An object will be received containing the info of the last attempt:
	 *   `attempt` is the number of attempts tried, starting from `1`
	 *   `error` is the error produced from the last attempt
	 *   `elasped` is the amount of time (in ms) elapsed since the beginning of the `retry` call
	 *
	 *   If this function's returned promised resolves to an `Error`, this retry will abort with such error. Otherwise if it resolves to a `Success(Noise)`, the retry will continue.
	 *
	 *   Some usage examples:
	 *     - wait longer for later attempts and stop after a limit:
	 *     ```haxe
	 *     function (info) return switch info.attempt {
	 *         case 10: info.error;
	 *         case v: Future.delay(v * 1000, Noise);
	 *     }
	 *     ```
	 *
	 *     - bail out on error codes that are fatal:
	 *     ```haxe
	 *     function (info) return switch info.error.code {
	 *       case Forbidden : info.error; // in this case new attempts probably make no sense
	 *       default: Future.delay(1000, Noise);
	 *     }
	 *     ```
	 *
	 *     - and also actually timeout:
	 *     ```haxe
	 *     // with using DateTools
	 *     function (info) return
	 *       if (info.elapsed > 2.minutes()) info.error
	 *       else Future.delay(1000, Noise);
	 *     ```
	 *
	 * @return Promise<T>
	 * 
	 * @param \Closure $gen
	 * @param \Closure $next
	 * 
	 * @return FutureObject
	 */
	static public function retry ($gen, $next) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:154: characters 4-53
		$stamp = function () {
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:154: characters 21-53
			return microtime(true) * 1000;
		};
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:155: characters 4-24
		$start = $stamp();
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:156: lines 156-163
		$attempt = null;
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:156: lines 156-163
		$attempt = function ($count)  use (&$next, &$stamp, &$start, &$gen, &$attempt) {
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:157: lines 157-162
			$f = function ($error)  use (&$count, &$next, &$stamp, &$start, &$attempt) {
				#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:159: characters 63-78
				$f1 = $stamp() - $start;
				#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:159: lines 159-160
				return Promise_Impl_::next($next(new HxAnon([
					"attempt" => $count,
					"error" => $error,
					"elapsed" => $f1,
				])), function ($_)  use (&$count, &$attempt) {
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:160: characters 31-56
					return $attempt($count + 1);
				});
			};
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:157: lines 157-162
			$ret = $gen()->flatMap(function ($o)  use (&$f) {
				#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:157: lines 157-162
				switch (Boot::dynamicField($o, 'index')) {
					case 0:
						#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:157: lines 157-162
						$d = $o->params[0];
						#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:157: lines 157-162
						return new SyncFuture(new LazyConst($o));
						break;
					case 1:
						#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:157: lines 157-162
						$e = $o->params[0];
						#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:157: lines 157-162
						return $f($e);
						break;
				}
			});
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:157: lines 157-162
			return $ret->gather();
		};
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:156: lines 156-163
		$attempt1 = $attempt;
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:156: lines 156-163
		return $attempt(1);
	}


	/**
	 * @param FutureObject $this
	 * @param mixed $v
	 * 
	 * @return FutureObject
	 */
	static public function swap ($this1, $v) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:64: characters 4-39
		return Future_Impl_::_tryMap($this1, function ($_)  use (&$v) {
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:64: characters 31-39
			return $v;
		});
	}


	/**
	 * @param FutureObject $this
	 * @param TypedError $e
	 * 
	 * @return FutureObject
	 */
	static public function swapError ($this1, $e) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:67: characters 4-41
		return Promise_Impl_::mapError($this1, function ($_)  use (&$e) {
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:67: characters 32-40
			return $e;
		});
	}


	/**
	 *  Creates a new `PromiseTrigger`
	 * 
	 * @return FutureTrigger
	 */
	static public function trigger () {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:293: characters 11-31
		$this1 = new FutureTrigger();
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:293: characters 11-31
		return $this1;
	}


	/**
	 * @param FutureObject $this
	 * @param \Closure $f
	 * 
	 * @return FutureObject
	 */
	static public function tryRecover ($this1, $f) {
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:31: lines 31-34
		$ret = $this1->flatMap(function ($o)  use (&$f) {
			#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:31: lines 31-34
			switch (Boot::dynamicField($o, 'index')) {
				case 0:
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:32: characters 19-20
					$d = $o->params[0];
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:32: characters 23-37
					return new SyncFuture(new LazyConst($o));
					break;
				case 1:
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:33: characters 19-20
					$e = $o->params[0];
					#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:33: characters 23-27
					return $f($e);
					break;
			}
		});
		#/home/vagrant/haxelib/tink_core/1,23,0/src/tink/core/Promise.hx:31: lines 31-34
		return $ret->gather();
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


self::$NULL = new SyncFuture(new LazyConst(Outcome::Success(null)));
self::$NOISE = new SyncFuture(new LazyConst(Outcome::Success(Noise::Noise())));
$ret = Future_Impl_::$NEVER->map(new HxClosure(Outcome::class, 'Success'));
self::$NEVER = $ret->gather();
	}
}


Boot::registerClass(Promise_Impl_::class, 'tink.core._Promise.Promise_Impl_');
Promise_Impl_::__hx__init();
