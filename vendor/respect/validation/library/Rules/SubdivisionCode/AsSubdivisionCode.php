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
 * Validator for American Samoa subdivision code.
 *
 * ISO 3166-1 alpha-2: AS
 *
 * @link http://www.geonames.org/AS/administrative-division-american-samoa.html
 */
class AsSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'E', // Eastern
        'M', // Manu'a
        'R', // Rose Island
        'S', // Swains Island
        'W', // Western
    ];

    public $compareIdentical = true;
}
