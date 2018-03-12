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

class PhpExtensionRequirement implements Requirement {
    /**
     * @var string
     */
    private $extension;

    /**
     * @param string $extension
     */
    public function __construct($extension) {
        $this->extension = $extension;
    }

    /**
     * @return string
     */
    public function __toString() {
        return $this->extension;
    }
}
