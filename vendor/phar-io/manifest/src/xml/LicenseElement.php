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

class LicenseElement extends ManifestElement {
    public function getType() {
        return $this->getAttributeValue('type');
    }

    public function getUrl() {
        return $this->getAttributeValue('url');
    }
}
