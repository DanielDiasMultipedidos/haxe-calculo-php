<?php
/**
 * Generated by Haxe 4.3.4
 */

namespace src\order\combo;

use \php\Boot;
use \src\order\pizza\Pizza;
use \src\order\extra\Extra;

class Combo {
	/**
	 * @var Extra[]|\Array_hx
	 */
	public $extras;
	/**
	 * @var Pizza[]|\Array_hx
	 */
	public $pizzas;
	/**
	 * @var float
	 */
	public $price;
	/**
	 * @var int
	 */
	public $quantity;
	/**
	 * @var float
	 */
	public $totalGrossPrice;

	/**
	 * @return void
	 */
	public function __construct () {
		#src/order/combo/Combo.hx:13: characters 37-38
		$this->totalGrossPrice = 0;
		#src/order/combo/Combo.hx:12: characters 35-37
		$this->pizzas = new \Array_hx();
		#src/order/combo/Combo.hx:11: characters 35-37
		$this->extras = new \Array_hx();
		#src/order/combo/Combo.hx:10: characters 28-29
		$this->quantity = 1;
		#src/order/combo/Combo.hx:9: characters 27-28
		$this->price = 0;
	}

	/**
	 * @param Extra $extra
	 * 
	 * @return void
	 */
	public function addExtra ($extra) {
		#src/order/combo/Combo.hx:30: characters 3-39
		$extra->calculateTotalGrossPriceItem();
		#src/order/combo/Combo.hx:31: characters 3-21
		$_this = $this->extras;
		$_this->arr[$_this->length++] = $extra;
	}

	/**
	 * @param Pizza $pizza
	 * 
	 * @return void
	 */
	public function addPizza ($pizza) {
		#src/order/combo/Combo.hx:26: characters 3-26
		$_this = $this->pizzas;
		$_this->arr[$_this->length++] = $pizza;
	}

	/**
	 * @param float $price
	 * 
	 * @return void
	 */
	public function addPrice ($price) {
		#src/order/combo/Combo.hx:18: characters 3-21
		$this->price = $price;
	}

	/**
	 * @param int $quantity
	 * 
	 * @return void
	 */
	public function addQuantity ($quantity) {
		#src/order/combo/Combo.hx:22: characters 3-27
		$this->quantity = $quantity;
	}

	/**
	 * @return float
	 */
	public function calculateTotalGrossPrice () {
		#src/order/combo/Combo.hx:34: lines 34-48
		$_gthis = $this;
		#src/order/combo/Combo.hx:35: characters 3-23
		$this->totalGrossPrice = 0;
		#src/order/combo/Combo.hx:36: characters 3-23
		$this->totalGrossPrice = $this->price;
		#src/order/combo/Combo.hx:38: characters 3-74
		$result = [];
		$data = $this->extras->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			#src/order/combo/Combo.hx:38: characters 28-32
			$_gthis1 = $_gthis;
			#src/order/combo/Combo.hx:38: characters 3-74
			$result[] = ($_gthis1->totalGrossPrice += $item->totalGrossPrice);
		}
		\Array_hx::wrap($result);
		#src/order/combo/Combo.hx:40: lines 40-43
		$result = [];
		$data = $this->pizzas->arr;
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		while ($_g_current < $_g_length) {
			$item = $_g_data[$_g_current++];
			#src/order/combo/Combo.hx:41: characters 4-59
			$totalGrossPizza = $item->calculateTotalGrossPrice();
			#src/order/combo/Combo.hx:42: characters 4-8
			$_gthis1 = $_gthis;
			#src/order/combo/Combo.hx:40: lines 40-43
			$result[] = ($_gthis1->totalGrossPrice += ($totalGrossPizza > $item->price ? $totalGrossPizza - $item->price : 0));
		}
		\Array_hx::wrap($result);
		#src/order/combo/Combo.hx:45: characters 3-40
		$this->totalGrossPrice *= $this->quantity;
		#src/order/combo/Combo.hx:47: characters 3-30
		return $this->totalGrossPrice;
	}
}

Boot::registerClass(Combo::class, 'src.order.combo.Combo');
