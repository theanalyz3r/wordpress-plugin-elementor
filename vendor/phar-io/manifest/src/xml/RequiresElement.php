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

class RequiresElement extends ManifestElement {
    public function getPHPElement() {
        return new PhpElement(
            $this->getChildByName('php')
        );
    }
}
