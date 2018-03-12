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

interface VersionConstraint {
	/**
	 * @param Version $version
	 *
	 * @return bool
	 */
	public function complies( Version $version );

	/**
	 * @return string
	 */
	public function asString();

}
