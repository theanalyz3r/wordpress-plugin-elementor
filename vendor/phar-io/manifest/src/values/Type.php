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

use PharIo\Version\VersionConstraint;

abstract class Type {
    /**
     * @return Application
     */
    public static function application() {
        return new Application;
    }

    /**
     * @return Library
     */
    public static function library() {
        return new Library;
    }

    /**
     * @param ApplicationName   $application
     * @param VersionConstraint $versionConstraint
     *
     * @return Extension
     */
    public static function extension(ApplicationName $application, VersionConstraint $versionConstraint) {
        return new Extension($application, $versionConstraint);
    }

    /**
     * @return bool
     */
    public function isApplication() {
        return false;
    }

    /**
     * @return bool
     */
    public function isLibrary() {
        return false;
    }

    /**
     * @return bool
     */
    public function isExtension() {
        return false;
    }
}
