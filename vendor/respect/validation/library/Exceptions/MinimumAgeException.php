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

class MinimumAgeException extends ValidationException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'The age must be {{age}} years or more.',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => 'The age must not be {{age}} years or more.',
        ],
    ];
}
