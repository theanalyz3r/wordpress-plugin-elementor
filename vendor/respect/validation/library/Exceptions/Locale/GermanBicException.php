<?php

/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace Respect\Validation\Exceptions\Locale;

use Respect\Validation\Exceptions\BicException;

class GermanBicException extends BicException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} must be a german BIC',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} must not be a german BIC',
        ],
    ];
}
