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

class PerfectSquareException extends ValidationException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} must be a valid perfect square',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} must not be a valid perfect square',
        ],
    ];
}
