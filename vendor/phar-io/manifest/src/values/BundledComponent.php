<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace PharIo\Manifest;

use PharIo\Version\Version;

class BundledComponent {
    /**
     * @var string
     */
    private $name;

    /**
     * @var Version
     */
    private $version;

    /**
     * @param string  $name
     * @param Version $version
     */
    public function __construct($name, Version $version) {
        $this->name    = $name;
        $this->version = $version;
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @return Version
     */
    public function getVersion() {
        return $this->version;
    }
}
