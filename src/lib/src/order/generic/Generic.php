<?php
/**
 * Generated by Haxe 4.3.3
 */

namespace src\order\generic;

use \php\Boot;
use \src\infrastructure\BaseItem;
use \src\order\extra\Extra;

class Generic extends BaseItem {
	/**
	 * @var Extra[]|\Array_hx
	 */
	public $extras;

	/**
	 * @return void
	 */
	public function __construct () {
		#src/order/generic/Generic.hx:9: characters 35-37
		$this->extras = new \Array_hx();
		#src/order/generic/Generic.hx:8: lines 8-27
		parent::__construct();
	}

	/**
	 * @param Extra $extra
	 * 
	 * @return void
	 */
	public function addExtra ($extra) {
		#src/order/generic/Generic.hx:12: characters 3-39
		$extra->calculateTotalGrossPriceItem();
		#src/order/generic/Generic.hx:13: characters 3-21
		$_this = $this->extras;
		$_this->arr[$_this->length++] = $extra;
	}

	/**
	 * @return float
	 */
	public function calculateTotalGrossPrice () {
		#src/order/generic/Generic.hx:16: lines 16-26
		$_gthis = $this;
		#src/order/generic/Generic.hx:17: characters 3-23
		$this->totalGrossPrice = 0;
		#src/order/generic/Generic.hx:19: characters 3-39
		parent::calculateTotalGrossPriceItem();
		#src/order/generic/Generic.hx:21: lines 21-23
		$result = [];
		$data = $this->extras->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			#src/order/generic/Generic.hx:22: characters 4-8
			$_gthis1 = $_gthis;
			#src/order/generic/Generic.hx:21: lines 21-23
			$result[] = ($_gthis1->totalGrossPrice += $item->totalGrossPrice);
		}
		\Array_hx::wrap($result);
		#src/order/generic/Generic.hx:25: characters 3-30
		return $this->totalGrossPrice;
	}
}

Boot::registerClass(Generic::class, 'src.order.generic.Generic');