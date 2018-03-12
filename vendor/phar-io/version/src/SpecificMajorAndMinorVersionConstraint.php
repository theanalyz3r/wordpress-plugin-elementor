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

class SpecificMajorAndMinorVersionConstraint extends AbstractVersionConstraint {
	/**
	 * @var int
	 */
	private $major = 0;

	/**
	 * @var int
	 */
	private $minor = 0;

	/**
	 * @param string $originalValue
	 * @param int $major
	 * @param int $minor
	 */
	public function __construct( $originalValue, $major, $minor ) {
		parent::__construct( $originalValue );

		$this->major = $major;
		$this->minor = $minor;
	}

	/**
	 * @param Version $version
	 *
	 * @return bool
	 */
	public function complies( Version $version ) {
		if ( $version->getMajor()->getValue() != $this->major ) {
			return false;
		}

		return $version->getMinor()->getValue() == $this->minor;
	}
}
