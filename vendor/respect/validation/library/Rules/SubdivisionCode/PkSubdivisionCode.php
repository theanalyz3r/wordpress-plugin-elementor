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
 * Validator for Pakistan subdivision code.
 *
 * ISO 3166-1 alpha-2: PK
 *
 * @link http://www.geonames.org/PK/administrative-division-pakistan.html
 */
class PkSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'BA', // Balochistan
        'IS', // Islamabad Capital Territory
        'JK', // Azad Kashmir
        'NA', // Gilgit-Baltistan
        'NW', // Khyber Pakhtunkhwa
        'PB', // Punjab
        'SD', // Sindh
        'TA', // Federally Administered Tribal Areas
    ];

    public $compareIdentical = true;
}
