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
use PharIo\Version\VersionConstraint;

class Extension extends Type {
    /**
     * @var ApplicationName
     */
    private $application;

    /**
     * @var VersionConstraint
     */
    private $versionConstraint;

    /**
     * @param ApplicationName   $application
     * @param VersionConstraint $versionConstraint
     */
    public function __construct(ApplicationName $application, VersionConstraint $versionConstraint) {
        $this->application       = $application;
        $this->versionConstraint = $versionConstraint;
    }

    /**
     * @return ApplicationName
     */
    public function getApplicationName() {
        return $this->application;
    }

    /**
     * @return VersionConstraint
     */
    public function getVersionConstraint() {
        return $this->versionConstraint;
    }

    /**
     * @return bool
     */
    public function isExtension() {
        return true;
    }

    /**
     * @param ApplicationName $name
     *
     * @return bool
     */
    public function isExtensionFor(ApplicationName $name) {
        return $this->application->isEqual($name);
    }

    /**
     * @param ApplicationName $name
     * @param Version         $version
     *
     * @return bool
     */
    public function isCompatibleWith(ApplicationName $name, Version $version) {
        return $this->isExtensionFor($name) && $this->versionConstraint->complies($version);
    }
}
