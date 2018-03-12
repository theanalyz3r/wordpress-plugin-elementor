<?php

/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace Respect\Validation\Rules;

use Respect\Validation\Rules\Locale\Factory;

class Bank extends AbstractWrapper
{
    /**
     * Defines the country code.
     *
     * The country code is not case sensitive.
     *
     * @param string  $countryCode The ISO 639-1 country code.
     * @param Factory $factory
     */
    public function __construct($countryCode, Factory $factory = null)
    {
        if (null === $factory) {
            $factory = new Factory();
        }

        $this->validatable = $factory->bank($countryCode);
    }
}
