<?php
/**
 * Generated by Haxe 4.3.3
 */

namespace src\infrastructure;

use \php\Boot;

class Helper {
	/**
	 * @param float $totalNetValue
	 * 
	 * @return float
	 */
	public function formatReturnToPHP ($totalNetValue) {
		#src/infrastructure/Helper.hx:19: characters 3-95
		$totalNetValueFormated = (new \NumberFormatter("en_US", 0, "#.##"))->format($totalNetValue);
		#src/infrastructure/Helper.hx:20: characters 3-47
		return \Std::parseFloat($totalNetValueFormated);
	}
}

Boot::registerClass(Helper::class, 'src.infrastructure.Helper');
