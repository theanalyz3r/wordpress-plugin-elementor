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

class AuthorElementCollection extends ElementCollection {
    public function current() {
        return new AuthorElement(
            $this->getCurrentElement()
        );
    }
}
