<?php
/**
 * Generated by Haxe 3.4.7
 */

namespace tink\_Stringly;

use \tink\core\OutcomeTools;
use \tink\core\Outcome;
use \php\Boot;
use \tink\core\TypedError;
use \php\_Boot\HxString;
use \php\_Boot\HxAnon;

final class Stringly_Impl_ {
	/**
	 * @var \EReg
	 */
	static public $SUPPORTED_DATE_REGEX;


	/**
	 * @param string $s
	 * @param bool $allowFloat
	 * 
	 * @return bool
	 */
	static public function isNumber ($s, $allowFloat) {
		#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:10: characters 4-35
		if (strlen($s) === 0) {
			#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:10: characters 23-35
			return false;
		}
		#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:12: lines 12-13
		$pos = 0;
		#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:12: lines 12-13
		$max = strlen($s);
		#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:26: characters 4-19
		if (($pos < $max) && (((strlen($s) === $pos ? 0 : ord($s[$pos]))) === 45)) {
			#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:26: characters 4-19
			$pos = $pos + 1;
		}
		#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:28: lines 28-31
		if (!$allowFloat) {
			#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:29: characters 10-25
			$tmp = null;
			#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:29: characters 10-25
			if (($pos < $max) && (((strlen($s) === $pos ? 0 : ord($s[$pos]))) === 48)) {
				#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:29: characters 10-25
				$pos = $pos + 1;
				#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:29: characters 10-25
				$tmp = ($pos - 1) > -1;
			} else {
				#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:29: characters 10-25
				$tmp = false;
			}
			#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:29: lines 29-30
			if ($tmp) {
				#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:30: characters 8-23
				if (($pos < $max) && (((strlen($s) === $pos ? 0 : ord($s[$pos]))) === 120)) {
					#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:30: characters 8-23
					$pos = $pos + 1;
				}
			}
		}
		#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:33: characters 4-12
		while (($pos < $max) && ((((strlen($s) === $pos ? 0 : ord($s[$pos]))) ^ 48) < 10)) {
			#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:33: characters 4-12
			$pos = $pos + 1;
		}
		#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:35: lines 35-43
		if ($allowFloat && ($pos < $max)) {
			#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:36: characters 10-25
			$tmp1 = null;
			#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:36: characters 10-25
			if (($pos < $max) && (((strlen($s) === $pos ? 0 : ord($s[$pos]))) === 46)) {
				#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:36: characters 10-25
				$pos = $pos + 1;
				#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:36: characters 10-25
				$tmp1 = ($pos - 1) > -1;
			} else {
				#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:36: characters 10-25
				$tmp1 = false;
			}
			#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:36: lines 36-37
			if ($tmp1) {
				#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:37: characters 8-16
				while (($pos < $max) && ((((strlen($s) === $pos ? 0 : ord($s[$pos]))) ^ 48) < 10)) {
					#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:37: characters 8-16
					$pos = $pos + 1;
				}
			}
			#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:39: characters 10-44
			$tmp2 = null;
			#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:39: characters 10-25
			$tmp3 = null;
			#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:39: characters 10-25
			if (($pos < $max) && (((strlen($s) === $pos ? 0 : ord($s[$pos]))) === 101)) {
				#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:39: characters 10-25
				$pos = $pos + 1;
				#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:39: characters 10-25
				$tmp3 = ($pos - 1) > -1;
			} else {
				#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:39: characters 10-25
				$tmp3 = false;
			}
			#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:39: characters 10-44
			if (!$tmp3) {
				#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:39: characters 29-44
				if (($pos < $max) && (((strlen($s) === $pos ? 0 : ord($s[$pos]))) === 69)) {
					#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:39: characters 29-44
					$pos = $pos + 1;
					#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:39: characters 10-44
					$tmp2 = ($pos - 1) > -1;
				} else {
					#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:39: characters 10-44
					$tmp2 = false;
				}
			} else {
				#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:39: characters 10-44
				$tmp2 = true;
			}
			#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:39: lines 39-42
			if ($tmp2) {
				#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:40: characters 8-23
				$tmp4 = null;
				#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:40: characters 8-23
				if (($pos < $max) && (((strlen($s) === $pos ? 0 : ord($s[$pos]))) === 43)) {
					#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:40: characters 8-23
					$pos = $pos + 1;
					#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:40: characters 8-23
					$tmp4 = ($pos - 1) > -1;
				} else {
					#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:40: characters 8-23
					$tmp4 = false;
				}
				#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:40: characters 8-42
				if (!$tmp4) {
					#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:40: characters 27-42
					if (($pos < $max) && (((strlen($s) === $pos ? 0 : ord($s[$pos]))) === 45)) {
						#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:40: characters 27-42
						$pos = $pos + 1;
					}
				}
				#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:41: characters 8-16
				while (($pos < $max) && ((((strlen($s) === $pos ? 0 : ord($s[$pos]))) ^ 48) < 10)) {
					#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:41: characters 8-16
					$pos = $pos + 1;
				}
			}
		}
		#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:45: characters 4-21
		return $pos === $max;
	}


	/**
	 * @param bool $b
	 * 
	 * @return string
	 */
	static public function ofBool ($b) {
		#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:158: characters 11-37
		if ($b) {
			#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:158: characters 19-23
			return "true";
		} else {
			#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:158: characters 31-36
			return "false";
		}
	}


	/**
	 * @param \Date $d
	 * 
	 * @return string
	 */
	static public function ofDate ($d) {
		#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:167: characters 4-31
		return Stringly_Impl_::ofFloat($d->getTime());
	}


	/**
	 * @param float $f
	 * 
	 * @return string
	 */
	static public function ofFloat ($f) {
		#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:164: characters 4-24
		return \Std::string($f);
	}


	/**
	 * @param int $i
	 * 
	 * @return string
	 */
	static public function ofInt ($i) {
		#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:161: characters 4-24
		return \Std::string($i);
	}


	/**
	 * @param string $this
	 * @param \Closure $f
	 * 
	 * @return Outcome
	 */
	static public function parse ($this1, $f) {
		#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:155: characters 11-17
		$f1 = $f;
		#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:155: characters 11-17
		$a1 = $this1;
		#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:155: characters 4-41
		return TypedError::catchExceptions(function ()  use (&$f1, &$a1) {
			#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:155: characters 11-17
			return $f1($a1);
		}, null, new HxAnon([
			"fileName" => "Stringly.hx",
			"lineNumber" => 155,
			"className" => "tink._Stringly.Stringly_Impl_",
			"methodName" => "parse",
		]));
	}


	/**
	 * @param string $this
	 * 
	 * @return Outcome
	 */
	static public function parseDate ($this1) {
		#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:88: characters 18-30
		$_g = Stringly_Impl_::parseFloat($this1);
		#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:88: characters 18-30
		switch (Boot::dynamicField($_g, 'index')) {
			case 0:
				#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:89: characters 19-20
				$f = $_g->params[0];
				#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:90: characters 8-33
				return Outcome::Success(\Date::fromTime($f));
				break;
			case 1:
				#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:92: characters 8-59
				if (!Stringly_Impl_::$SUPPORTED_DATE_REGEX->match($this1)) {
					#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:92: characters 46-59
					return Outcome::Failure(new TypedError(422, "" . ($this1??'null') . " is not a valid date", new HxAnon([
						"fileName" => "Stringly.hx",
						"lineNumber" => 92,
						"className" => "tink._Stringly.Stringly_Impl_",
						"methodName" => "parseDate",
					])));
				}
				#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:110: characters 8-44
				$s = \StringTools::replace($this1, "Z", "+00:00");
				#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:111: characters 8-156
				$d = \DateTime::createFromFormat((Stringly_Impl_::$SUPPORTED_DATE_REGEX->matched(2) === null ? "Y-m-d\\TH:i:sP" : "Y-m-d\\TH:i:s.uP"), $s, new \DateTimeZone("UTC"));
				#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:112: characters 8-52
				if (!$d) {
					#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:112: characters 39-52
					return Outcome::Failure(new TypedError(422, "" . ($this1??'null') . " is not a valid date", new HxAnon([
						"fileName" => "Stringly.hx",
						"lineNumber" => 112,
						"className" => "tink._Stringly.Stringly_Impl_",
						"methodName" => "parseDate",
					])));
				}
				#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:113: characters 8-55
				return Outcome::Success(\Date::fromTime($d->getTimestamp() * 1000));
				break;
		}
	}


	/**
	 * @param string $this
	 * 
	 * @return Outcome
	 */
	static public function parseFloat ($this1) {
		#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:56: characters 18-29
		$_g = trim($this1);
		#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:57: characters 11-12
		$v = $_g;
		#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:57: lines 57-60
		if (Stringly_Impl_::isNumber($v, true)) {
			#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:58: characters 8-44
			return Outcome::Success(\Std::parseFloat($v));
		} else {
			#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:59: characters 11-12
			$v1 = $_g;
			#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:60: characters 8-93
			return Outcome::Failure(new TypedError(422, "" . ($v1??'null') . " (encoded as " . ($this1??'null') . ") is not a valid float", new HxAnon([
				"fileName" => "Stringly.hx",
				"lineNumber" => 60,
				"className" => "tink._Stringly.Stringly_Impl_",
				"methodName" => "parseFloat",
			])));
		}
	}


	/**
	 * @param string $this
	 * 
	 * @return Outcome
	 */
	static public function parseInt ($this1) {
		#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:67: characters 18-29
		$_g = trim($this1);
		#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:68: characters 11-12
		$v = $_g;
		#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:68: lines 68-71
		if (Stringly_Impl_::isNumber($v, false)) {
			#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:69: characters 8-40
			return Outcome::Success(\Std::parseInt($v));
		} else {
			#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:70: characters 11-12
			$v1 = $_g;
			#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:71: characters 8-95
			return Outcome::Failure(new TypedError(422, "" . ($v1??'null') . " (encoded as " . ($this1??'null') . ") is not a valid integer", new HxAnon([
				"fileName" => "Stringly.hx",
				"lineNumber" => 71,
				"className" => "tink._Stringly.Stringly_Impl_",
				"methodName" => "parseInt",
			])));
		}
	}


	/**
	 * @param string $this
	 * 
	 * @return bool
	 */
	static public function toBool ($this1) {
		#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:50: lines 50-53
		if ($this1 !== null) {
			#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:50: characters 29-54
			$_g = HxString::toLowerCase(trim($this1));
			#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:50: characters 29-54
			switch ($_g) {
				case "0":
				case "false":
				case "no":
					#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:51: characters 33-38
					return false;
					break;
				default:
					#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:52: characters 17-21
					return true;
					break;
			}
		} else {
			#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:50: lines 50-53
			return false;
		}
	}


	/**
	 * @param string $this
	 * 
	 * @return \Date
	 */
	static public function toDate ($this1) {
		#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:152: characters 4-29
		return OutcomeTools::sure(Stringly_Impl_::parseDate($this1));
	}


	/**
	 * @param string $this
	 * 
	 * @return float
	 */
	static public function toFloat ($this1) {
		#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:64: characters 4-30
		return OutcomeTools::sure(Stringly_Impl_::parseFloat($this1));
	}


	/**
	 * @param string $this
	 * 
	 * @return int
	 */
	static public function toInt ($this1) {
		#/home/vagrant/haxelib/tink_stringly/0,3,1/src/tink/Stringly.hx:75: characters 4-28
		return OutcomeTools::sure(Stringly_Impl_::parseInt($this1));
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


self::$SUPPORTED_DATE_REGEX = new \EReg("^(\\d{4}-\\d{2}-\\d{2}T\\d{2}:\\d{2}:\\d{2})(\\.\\d{3})?(Z|[\\+-]\\d{2}:\\d{2})\$", "");
	}
}


Boot::registerClass(Stringly_Impl_::class, 'tink._Stringly.Stringly_Impl_');
Stringly_Impl_::__hx__init();
