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

class PhpElement extends ManifestElement {
    public function getVersion() {
        return $this->getAttributeValue('version');
    }

    public function hasExtElements() {
        return $this->hasChild('ext');
    }

    public function getExtElements() {
        return new ExtElementCollection(
            $this->getChildrenByName('ext')
        );
    }
}
