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
 * Validator for Israel subdivision code.
 *
 * ISO 3166-1 alpha-2: IL
 *
 * @link http://www.geonames.org/IL/administrative-division-israel.html
 */
class IlSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'D', // Southern
        'HA', // Haifa
        'JM', // Jerusalem
        'M', // Central
        'TA', // Tel Aviv
        'Z', // Northern
    ];

    public $compareIdentical = true;
}
