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
 * @author David Meister <thedavidmeister@gmail.com>
 */
class FactorException extends ValidationException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} must be a factor of {{dividend}}',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} must not be a factor of {{dividend}}',
        ],
    ];
}
