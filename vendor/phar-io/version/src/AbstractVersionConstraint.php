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

abstract class AbstractVersionConstraint implements VersionConstraint {
	/**
	 * @var string
	 */
	private $originalValue = '';

	/**
	 * @param string $originalValue
	 */
	public function __construct( $originalValue ) {
		$this->originalValue = $originalValue;
	}

	/**
	 * @return string
	 */
	public function asString() {
		return $this->originalValue;
	}
}
