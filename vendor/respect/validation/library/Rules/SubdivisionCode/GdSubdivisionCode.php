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
 * Validator for Grenada subdivision code.
 *
 * ISO 3166-1 alpha-2: GD
 *
 * @link http://www.geonames.org/GD/administrative-division-grenada.html
 */
class GdSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        '01', // Saint Andrew
        '02', // Saint David
        '03', // Saint George
        '04', // Saint John
        '05', // Saint Mark
        '06', // Saint Patrick
        '10', // Southern Grenadine Islands
    ];

    public $compareIdentical = true;
}
