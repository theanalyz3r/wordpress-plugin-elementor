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

class CopyrightElement extends ManifestElement {
    public function getAuthorElements() {
        return new AuthorElementCollection(
            $this->getChildrenByName('author')
        );
    }

    public function getLicenseElement() {
        return new LicenseElement(
            $this->getChildByName('license')
        );
    }
}
