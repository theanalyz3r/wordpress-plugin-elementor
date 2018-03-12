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

class ExtensionElement extends ManifestElement {
    public function getFor() {
        return $this->getAttributeValue('for');
    }

    public function getCompatible() {
        return $this->getAttributeValue('compatible');
    }
}
