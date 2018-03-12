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

class DigitException extends AlphaException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} must contain only digits (0-9)',
            self::EXTRA => '{{name}} must contain only digits (0-9) and "{{additionalChars}}"',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} must not contain digits (0-9)',
            self::EXTRA => '{{name}} must not contain digits (0-9) or "{{additionalChars}}"',
        ],
    ];
}
