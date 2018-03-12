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
 * Exception class for Mimetype rule.
 *
 * @author Henrique Moody <henriquemoody@gmail.com>
 */
class MimetypeException extends ValidationException
{
    /**
     * @var array
     */
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} must have {{mimetype}} mimetype',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} must not have {{mimetype}} mimetype',
        ],
    ];
}
