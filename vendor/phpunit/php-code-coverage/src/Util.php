<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace SebastianBergmann\CodeCoverage;

/**
 * Utility methods.
 */
class Util {
	/**
	 * @param float $a
	 * @param float $b
	 * @param bool $asString
	 * @param bool $fixedWidth
	 *
	 * @return float|int|string
	 */
	public static function percent( $a, $b, $asString = false, $fixedWidth = false ) {
		if ( $asString && $b == 0 ) {
			return '';
		}

		$percent = 100;

		if ( $b > 0 ) {
			$percent = ( $a / $b ) * 100;
		}

		if ( $asString ) {
			$format = $fixedWidth ? '%6.2F%%' : '%01.2F%%';

			return sprintf( $format, $percent );
		}

		return $percent;
	}
}
