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

class VideoUrlException extends ValidationException
{
    const SERVICE = 1;

    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} must be a valid video URL',
            self::SERVICE => '{{name}} must be a valid {{service}} video URL',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} must not be a valid video URL',
            self::SERVICE => '{{name}} must not be a valid {{service}} video URL',
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public function chooseTemplate()
    {
        if (false !== $this->getParam('service')) {
            return self::SERVICE;
        }

        return static::STANDARD;
    }
}
