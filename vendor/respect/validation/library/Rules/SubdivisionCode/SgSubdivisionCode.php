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
 * Validator for Singapore subdivision code.
 *
 * ISO 3166-1 alpha-2: SG
 *
 * @link http://www.geonames.org/SG/administrative-division-singapore.html
 */
class SgSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        '01', // Central Singapore
        '02', // North East
        '03', // North West
        '04', // South East
        '05', // South West
    ];

    public $compareIdentical = true;
}
