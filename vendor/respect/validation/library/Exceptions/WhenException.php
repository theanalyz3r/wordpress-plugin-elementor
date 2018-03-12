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

class WhenException extends ValidationException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'Data validation failed for {{name}}',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => 'Data validation failed for {{name}}',
        ],
    ];
}
