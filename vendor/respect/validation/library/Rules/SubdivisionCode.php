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

use Respect\Validation\Exceptions\ComponentException;

/**
 * Validates country subdivision codes according to ISO 3166-2.
 *
 * @link http://en.wikipedia.org/wiki/ISO_3166-2
 * @link http://www.geonames.org/countries/
 */
class SubdivisionCode extends AbstractWrapper
{
    public $countryCode;

    public function __construct($countryCode)
    {
        $shortName = ucfirst(strtolower($countryCode)).'SubdivisionCode';
        $className = __NAMESPACE__.'\\SubdivisionCode\\'.$shortName;
        if (!class_exists($className)) {
            throw new ComponentException(sprintf('"%s" is not a valid country code in ISO 3166-2', $countryCode));
        }

        $this->countryCode = $countryCode;
        $this->validatable = new $className();
    }
}
