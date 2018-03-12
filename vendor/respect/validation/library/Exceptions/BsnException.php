<?php

/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace Respect\Validation\Exceptions;

/**
 * @author Ronald Drenth <ronalddrenth@gmail.com>
 */
class BsnException extends ValidationException
{
    /**
     * @var array
     */
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} must be a BSN',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} must not be a BSN',
        ],
    ];
}
