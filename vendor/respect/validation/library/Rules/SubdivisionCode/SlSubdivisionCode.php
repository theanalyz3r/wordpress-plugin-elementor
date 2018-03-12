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
 * Validator for Sierra Leone subdivision code.
 *
 * ISO 3166-1 alpha-2: SL
 *
 * @link http://www.geonames.org/SL/administrative-division-sierra-leone.html
 */
class SlSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'E', // Eastern
        'N', // Northern
        'S', // Southern
        'W', // Western
    ];

    public $compareIdentical = true;
}
