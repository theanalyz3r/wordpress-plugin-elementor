<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

use PharIo\Manifest\ManifestLoader;
use PharIo\Manifest\ManifestSerializer;

require __DIR__ . '/../vendor/autoload.php';

$manifest = ManifestLoader::fromFile( __DIR__ . '/../tests/_fixture/phpunit-5.6.5.xml' );

echo sprintf(
	"Manifest for %s (%s):\n\n",
	$manifest->getName(),
	$manifest->getVersion()->getVersionString()
);
echo ( new ManifestSerializer )->serializeToString( $manifest );
