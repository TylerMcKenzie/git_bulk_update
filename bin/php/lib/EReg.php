<?php
/**
 * Generated by Haxe 3.4.7
 */

use \php\Boot;
use \php\_Boot\HxException;
use \php\_Boot\HxString;

final /**
 * The EReg class represents regular expressions.
 * While basic usage and patterns consistently work across platforms, some more
 * complex operations may yield different results. This is a necessary trade-
 * off to retain a certain level of performance.
 * EReg instances can be created by calling the constructor, or with the
 * special syntax `~/pattern/modifier`
 * EReg instances maintain an internal state, which is affected by several of
 * its methods.
 * A detailed explanation of the supported operations is available at
 * <https://haxe.org/manual/std-regex.html>
 */
class EReg {
	/**
	 * @var bool
	 */
	public $global;
	/**
	 * @var string
	 */
	public $last;
	/**
	 * @var mixed
	 */
	public $matches;
	/**
	 * @var string
	 */
	public $options;
	/**
	 * @var string
	 */
	public $pattern;
	/**
	 * @var string
	 */
	public $re;


	/**
	 * Creates a new regular expression with pattern `r` and modifiers `opt`.
	 * This is equivalent to the shorthand syntax `~/r/opt`
	 * If `r` or `opt` are null, the result is unspecified.
	 * 
	 * @param string $r
	 * @param string $opt
	 * 
	 * @return void
	 */
	public function __construct ($r, $opt) {
		#/usr/share/haxe/std/php7/_std/EReg.hx:37: characters 2-18
		$this->pattern = $r;
		#/usr/share/haxe/std/php7/_std/EReg.hx:38: characters 2-25
		$a = HxString::split($opt, "g");
		#/usr/share/haxe/std/php7/_std/EReg.hx:39: characters 2-23
		$this->global = $a->length > 1;
		#/usr/share/haxe/std/php7/_std/EReg.hx:40: lines 40-42
		if ($this->global) {
			#/usr/share/haxe/std/php7/_std/EReg.hx:41: characters 3-19
			$opt = $a->join("");
		}
		#/usr/share/haxe/std/php7/_std/EReg.hx:43: characters 2-20
		$this->options = $opt;
		#/usr/share/haxe/std/php7/_std/EReg.hx:44: characters 2-63
		$this->re = "\"" . (str_replace("\"", "\\\"", $r)??'null') . "\"" . ($opt??'null');
	}


	/**
	 * Tells if `this` regular expression matches String `s`.
	 * This method modifies the internal state.
	 * If `s` is `null`, the result is unspecified.
	 * 
	 * @param string $s
	 * 
	 * @return bool
	 */
	public function match ($s) {
		#/usr/share/haxe/std/php7/_std/EReg.hx:48: characters 2-77
		$p = preg_match($this->re, $s, $this->matches, PREG_OFFSET_CAPTURE);
		#/usr/share/haxe/std/php7/_std/EReg.hx:50: lines 50-54
		if ($p > 0) {
			#/usr/share/haxe/std/php7/_std/EReg.hx:51: characters 3-11
			$this->last = $s;
		} else {
			#/usr/share/haxe/std/php7/_std/EReg.hx:53: characters 3-14
			$this->last = null;
		}
		#/usr/share/haxe/std/php7/_std/EReg.hx:55: characters 2-14
		return $p > 0;
	}


	/**
	 * Returns the matched sub-group `n` of `this` EReg.
	 * This method should only be called after `this.match` or
	 * `this.matchSub`, and then operates on the String of that operation.
	 * The index `n` corresponds to the n-th set of parentheses in the pattern
	 * of `this` EReg. If no such sub-group exists, an exception is thrown.
	 * If `n` equals 0, the whole matched substring is returned.
	 * 
	 * @param int $n
	 * 
	 * @return string
	 */
	public function matched ($n) {
		#/usr/share/haxe/std/php7/_std/EReg.hx:59: characters 2-38
		if (($this->matches === null) || ($n < 0)) {
			#/usr/share/haxe/std/php7/_std/EReg.hx:59: characters 33-38
			throw new HxException("EReg::matched");
		}
		#/usr/share/haxe/std/php7/_std/EReg.hx:62: characters 2-45
		if ($n >= count($this->matches)) {
			#/usr/share/haxe/std/php7/_std/EReg.hx:62: characters 34-45
			return null;
		}
		#/usr/share/haxe/std/php7/_std/EReg.hx:63: characters 2-42
		if ($this->matches[$n][1] < 0) {
			#/usr/share/haxe/std/php7/_std/EReg.hx:63: characters 31-42
			return null;
		}
		#/usr/share/haxe/std/php7/_std/EReg.hx:64: characters 9-22
		return $this->matches[$n][0];
	}


	/**
	 * Replaces the first substring of `s` which `this` EReg matches with `by`.
	 * If `this` EReg does not match any substring, the result is `s`.
	 * By default, this method replaces only the first matched substring. If
	 * the global g modifier is in place, all matched substrings are replaced.
	 * If `by` contains `$1` to `$9`, the digit corresponds to number of a
	 * matched sub-group and its value is used instead. If no such sub-group
	 * exists, the replacement is unspecified. The string `$$` becomes `$`.
	 * If `s` or `by` are null, the result is unspecified.
	 * 
	 * @param string $s
	 * @param string $by
	 * 
	 * @return string
	 */
	public function replace ($s, $by) {
		#/usr/share/haxe/std/php7/_std/EReg.hx:103: characters 2-45
		$by = str_replace("\\\$", "\\\\\$", $by);
		#/usr/share/haxe/std/php7/_std/EReg.hx:104: characters 2-42
		$by = str_replace("\$\$", "\\\$", $by);
		#/usr/share/haxe/std/php7/_std/EReg.hx:105: lines 105-107
		if (!preg_match("/\\\\([^?].*?\\\\)/", $this->re)) {
			#/usr/share/haxe/std/php7/_std/EReg.hx:106: characters 3-56
			$by = preg_replace("/\\\$(\\d+)/", "\\\$\\1", $by);
		}
		#/usr/share/haxe/std/php7/_std/EReg.hx:108: characters 2-56
		return preg_replace($this->re, $by, $s, ($this->global ? -1 : 1));
	}
}


Boot::registerClass(EReg::class, 'EReg');
