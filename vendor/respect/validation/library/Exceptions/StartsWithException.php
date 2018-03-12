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

class StartsWithException extends ValidationException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} must start with ({{startValue}})',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} must not start with ({{startValue}})',
        ],
    ];
}
