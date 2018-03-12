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

class SpecificMajorVersionConstraint extends AbstractVersionConstraint {
	/**
	 * @var int
	 */
	private $major = 0;

	/**
	 * @param string $originalValue
	 * @param int $major
	 */
	public function __construct( $originalValue, $major ) {
		parent::__construct( $originalValue );

		$this->major = $major;
	}

	/**
	 * @param Version $version
	 *
	 * @return bool
	 */
	public function complies( Version $version ) {
		return $version->getMajor()->getValue() == $this->major;
	}
}
