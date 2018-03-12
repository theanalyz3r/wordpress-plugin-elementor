<?php

/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace Respect\Validation\Rules\SubdivisionCode;

use Respect\Validation\Rules\AbstractSearcher;

/**
 * Validator for South Africa subdivision code.
 *
 * ISO 3166-1 alpha-2: ZA
 *
 * @link http://www.geonames.org/ZA/administrative-division-south-africa.html
 */
class ZaSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'EC', // Eastern Cape
        'FS', // Free State
        'GP', // Gauteng
        'LP', // Limpopo
        'MP', // Mpumalanga
        'NC', // Northern Cape
        'NW', // North West
        'WC', // Western Cape
        'ZN', // KwaZulu-Natal
    ];

    public $compareIdentical = true;
}
