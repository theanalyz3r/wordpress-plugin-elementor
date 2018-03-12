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

class RegexException extends ValidationException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} must validate against {{regex}}',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} must not validate against {{regex}}',
        ],
    ];
}
