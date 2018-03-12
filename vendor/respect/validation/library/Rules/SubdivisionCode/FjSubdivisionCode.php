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
 * Validator for Fiji subdivision code.
 *
 * ISO 3166-1 alpha-2: FJ
 *
 * @link http://www.geonames.org/FJ/administrative-division-fiji.html
 */
class FjSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'C', // Central Division
        'E', // Eastern Division
        'N', // Northern Division
        'R', // Rotuma
        'W', // Western Division
    ];

    public $compareIdentical = true;
}
