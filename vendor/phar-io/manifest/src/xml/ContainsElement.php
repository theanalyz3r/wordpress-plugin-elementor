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

class ContainsElement extends ManifestElement {
    public function getName() {
        return $this->getAttributeValue('name');
    }

    public function getVersion() {
        return $this->getAttributeValue('version');
    }

    public function getType() {
        return $this->getAttributeValue('type');
    }

    public function getExtensionElement() {
        return new ExtensionElement(
            $this->getChildByName('extension')
        );
    }
}
