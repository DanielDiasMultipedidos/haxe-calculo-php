<?php
/**
 * Generated by Haxe 4.3.4
 */

namespace haxe\iterators;

use \php\Boot;

/**
 * This iterator is used only when `Array<T>` is passed to `Iterable<T>`
 */
class ArrayIterator {
	/**
	 * @var mixed[]|\Array_hx
	 */
	public $array;

	/**
	 * Create a new `ArrayIterator`.
	 * 
	 * @param mixed[]|\Array_hx $array
	 * 
	 * @return void
	 */
	public function __construct ($array) {
		#/usr/share/haxe/std/haxe/iterators/ArrayIterator.hx:37: characters 3-21
		$this->array = $array;
	}
}

Boot::registerClass(ArrayIterator::class, 'haxe.iterators.ArrayIterator');
