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
 * Validator for Saint Vincent and the Grenadines subdivision code.
 *
 * ISO 3166-1 alpha-2: VC
 *
 * @link http://www.geonames.org/VC/administrative-division-saint-vincent-and-the-grenadines.html
 */
class VcSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        '01', // Charlotte
        '02', // Saint Andrew
        '03', // Saint David
        '04', // Saint George
        '05', // Saint Patrick
        '06', // Grenadines
    ];

    public $compareIdentical = true;
}
