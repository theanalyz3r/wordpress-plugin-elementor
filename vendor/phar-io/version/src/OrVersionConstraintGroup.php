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

class OrVersionConstraintGroup extends AbstractVersionConstraint {
	/**
	 * @var VersionConstraint[]
	 */
	private $constraints = [];

	/**
	 * @param string $originalValue
	 * @param VersionConstraint[] $constraints
	 */
	public function __construct( $originalValue, array $constraints ) {
		parent::__construct( $originalValue );

		$this->constraints = $constraints;
	}

	/**
	 * @param Version $version
	 *
	 * @return bool
	 */
	public function complies( Version $version ) {
		foreach ( $this->constraints as $constraint ) {
			if ( $constraint->complies( $version ) ) {
				return true;
			}
		}

		return false;
	}
}
