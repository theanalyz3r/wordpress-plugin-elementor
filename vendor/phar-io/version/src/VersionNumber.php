<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace PharIo\Version;

class VersionNumber {
	/**
	 * @var int
	 */
	private $value;

	/**
	 * @param mixed $value
	 */
	public function __construct( $value ) {
		if ( is_numeric( $value ) ) {
			$this->value = $value;
		}
	}

	/**
	 * @return bool
	 */
	public function isAny() {
		return $this->value === null;
	}

	/**
	 * @return int
	 */
	public function getValue() {
		return $this->value;
	}
}
