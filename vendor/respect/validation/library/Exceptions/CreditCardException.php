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

class CreditCardException extends ValidationException
{
    const BRANDED = 1;

    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} must be a valid Credit Card number',
            self::BRANDED => '{{name}} must be a valid {{brand}} Credit Card number',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} must not be a valid Credit Card number',
            self::BRANDED => '{{name}} must not be a valid {{brand}} Credit Card number',
        ],
    ];

    public function chooseTemplate()
    {
        if (!$this->getParam('brand')) {
            return static::STANDARD;
        }

        return static::BRANDED;
    }
}
