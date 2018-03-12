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

class NfeAccessKeyException extends ValidationException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} must be a valid NFe access key',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} must not be a valid NFe access key',
        ],
    ];
}
