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
 * Validator for Bermuda subdivision code.
 *
 * ISO 3166-1 alpha-2: BM
 *
 * @link http://www.geonames.org/BM/administrative-division-bermuda.html
 */
class BmSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'DS', // Devonshire
        'GC', // Saint George
        'HA', // Hamilton
        'HC', // Hamilton City
        'PB', // Pembroke
        'PG', // Paget
        'SA', // Sandys
        'SG', // Saint George's
        'SH', // Southampton
        'SM', // Smith's
        'WA', // Warwick
    ];

    public $compareIdentical = true;
}
