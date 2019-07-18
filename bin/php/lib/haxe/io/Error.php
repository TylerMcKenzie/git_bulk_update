<?php
/**
 * Generated by Haxe 3.4.7
 */

namespace haxe\io;

use \php\Boot;
use \php\_Boot\HxEnum;

class Error extends HxEnum {
	/**
	 * @return Error
	 */
	static public function Blocked () {
		return HxEnum::singleton(static::class, 'Blocked', 0);
	}


	/**
	 * @param mixed $e
	 * 
	 * @return Error
	 */
	static public function Custom ($e) {
		return new Error('Custom', 3, [$e]);
	}


	/**
	 * @return Error
	 */
	static public function OutsideBounds () {
		return HxEnum::singleton(static::class, 'OutsideBounds', 2);
	}


	/**
	 * @return Error
	 */
	static public function Overflow () {
		return HxEnum::singleton(static::class, 'Overflow', 1);
	}


	/**
	 * Returns array of (constructorIndex => constructorName)
	 *
	 * @return string[]
	 */
	static public function __hx__list () {
		return [
			0 => 'Blocked',
			3 => 'Custom',
			2 => 'OutsideBounds',
			1 => 'Overflow',
		];
	}


	/**
	 * Returns array of (constructorName => parametersCount)
	 *
	 * @return int[]
	 */
	static public function __hx__paramsCount () {
		return [
			'Blocked' => 0,
			'Custom' => 1,
			'OutsideBounds' => 0,
			'Overflow' => 0,
		];
	}
}


Boot::registerClass(Error::class, 'haxe.io.Error');
