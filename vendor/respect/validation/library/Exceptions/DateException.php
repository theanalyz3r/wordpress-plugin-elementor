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

class DateException extends ValidationException
{
    const FORMAT = 1;

    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} must be a valid date',
            self::FORMAT => '{{name}} must be a valid date. Sample format: {{format}}',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} must not be a valid date',
            self::FORMAT => '{{name}} must not be a valid date in the format {{format}}',
        ],
    ];

    public function configure($name, array $params = [])
    {
        $params['format'] = date(
            $params['format'],
            strtotime('2005-12-30 01:02:03')
        );

        return parent::configure($name, $params);
    }

    public function chooseTemplate()
    {
        return $this->getParam('format') ? static::FORMAT : static::STANDARD;
    }
}
