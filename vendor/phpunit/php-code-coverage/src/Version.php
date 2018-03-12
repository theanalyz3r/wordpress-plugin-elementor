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

use SebastianBergmann\Version as VersionId;

class Version {
	private static $version;

	/**
	 * @return string
	 */
	public static function id() {
		if ( self::$version === null ) {
			$version       = new VersionId( '5.2.2', dirname( __DIR__ ) );
			self::$version = $version->getVersion();
		}

		return self::$version;
	}
}
