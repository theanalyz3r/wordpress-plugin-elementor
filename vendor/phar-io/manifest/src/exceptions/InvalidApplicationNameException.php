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

class InvalidApplicationNameException extends \InvalidArgumentException implements Exception {
    const NotAString    = 1;
    const InvalidFormat = 2;
}
