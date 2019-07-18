<?php
/**
 * Generated by Haxe 3.4.7
 */

namespace tink\cli;

use \php\Boot;
use \php\_Boot\HxEnum;

class PromptTypeBase extends HxEnum {
	/**
	 * @param string $prompt
	 * @param \Array_hx $choices
	 * 
	 * @return PromptTypeBase
	 */
	static public function MultipleChoices ($prompt, $choices) {
		return new PromptTypeBase('MultipleChoices', 1, [$prompt, $choices]);
	}


	/**
	 * @param string $prompt
	 * 
	 * @return PromptTypeBase
	 */
	static public function Secure ($prompt) {
		return new PromptTypeBase('Secure', 2, [$prompt]);
	}


	/**
	 * @param string $prompt
	 * 
	 * @return PromptTypeBase
	 */
	static public function Simple ($prompt) {
		return new PromptTypeBase('Simple', 0, [$prompt]);
	}


	/**
	 * Returns array of (constructorIndex => constructorName)
	 *
	 * @return string[]
	 */
	static public function __hx__list () {
		return [
			1 => 'MultipleChoices',
			2 => 'Secure',
			0 => 'Simple',
		];
	}


	/**
	 * Returns array of (constructorName => parametersCount)
	 *
	 * @return int[]
	 */
	static public function __hx__paramsCount () {
		return [
			'MultipleChoices' => 2,
			'Secure' => 1,
			'Simple' => 1,
		];
	}
}


Boot::registerClass(PromptTypeBase::class, 'tink.cli.PromptTypeBase');
