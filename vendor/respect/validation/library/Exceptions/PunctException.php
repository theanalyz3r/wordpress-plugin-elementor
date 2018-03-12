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

class PunctException extends AlphaException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} must contain only punctuation characters',
            self::EXTRA => '{{name}} must contain only punctuation characters and "{{additionalChars}}"',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} must not contain punctuation characters',
            self::EXTRA => '{{name}} must not contain punctuation characters or "{{additionalChars}}"',
        ],
    ];
}
