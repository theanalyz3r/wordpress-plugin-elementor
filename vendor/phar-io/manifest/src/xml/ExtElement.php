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

class ExtElement extends ManifestElement {
    public function getName() {
        return $this->getAttributeValue('name');
    }
}
