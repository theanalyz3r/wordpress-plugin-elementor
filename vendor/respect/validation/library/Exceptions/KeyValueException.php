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

class KeyValueException extends ValidationException
{
    const COMPONENT = 1;

    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'Key {{name}} must be present',
            self::COMPONENT => '{{baseKey}} must be valid to validate {{comparedKey}}',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => 'Key {{name}} must not be present',
            self::COMPONENT => '{{baseKey}} must not be valid to validate {{comparedKey}}',
        ],
    ];

    public function chooseTemplate()
    {
        return $this->getParam('component') ? static::COMPONENT : static::STANDARD;
    }
}
