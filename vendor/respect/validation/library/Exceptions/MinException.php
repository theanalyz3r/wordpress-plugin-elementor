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

class MinException extends ValidationException
{
    const INCLUSIVE = 1;

    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} must be greater than {{interval}}',
            self::INCLUSIVE => '{{name}} must be greater than or equal to {{interval}}',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} must not be greater than {{interval}}',
            self::INCLUSIVE => '{{name}} must not be greater than or equal to {{interval}}',
        ],
    ];

    public function chooseTemplate()
    {
        return $this->getParam('inclusive') ? static::INCLUSIVE : static::STANDARD;
    }
}
