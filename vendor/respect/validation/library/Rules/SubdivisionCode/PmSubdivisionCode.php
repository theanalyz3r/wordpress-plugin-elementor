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
 * Validator for Saint Pierre and Miquelon subdivision code.
 *
 * ISO 3166-1 alpha-2: PM
 *
 * @link http://www.geonames.org/PM/administrative-division-saint-pierre-and-miquelon.html
 */
class PmSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'M', // Miquelon
        'P', // Saint Pierre
    ];

    public $compareIdentical = true;
}
