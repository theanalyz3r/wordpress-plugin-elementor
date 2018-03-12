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
 * Exception class for Size rule.
 *
 * @author Henrique Moody <henriquemoody@gmail.com>
 */
class SizeException extends BetweenException
{
    /**
     * @var array
     */
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::BOTH => '{{name}} must be between {{minSize}} and {{maxSize}}',
            self::LOWER => '{{name}} must be greater than {{minSize}}',
            self::GREATER => '{{name}} must be lower than {{maxSize}}',
        ],
        self::MODE_NEGATIVE => [
            self::BOTH => '{{name}} must not be between {{minSize}} and {{maxSize}}',
            self::LOWER => '{{name}} must not be greater than {{minSize}}',
            self::GREATER => '{{name}} must not be lower than {{maxSize}}',
        ],
    ];
}
