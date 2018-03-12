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

class Application extends Type {
    /**
     * @return bool
     */
    public function isApplication() {
        return true;
    }
}
