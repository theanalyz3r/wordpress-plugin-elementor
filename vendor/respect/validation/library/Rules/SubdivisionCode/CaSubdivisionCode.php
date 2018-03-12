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
 * Validator for Canada subdivision code.
 *
 * ISO 3166-1 alpha-2: CA
 *
 * @link http://www.geonames.org/CA/administrative-division-canada.html
 */
class CaSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'AB', // Alberta
        'BC', // British Columbia
        'MB', // Manitoba
        'NB', // New Brunswick
        'NL', // Newfoundland and Labrador
        'NS', // Nova Scotia
        'NT', // Northwest Territories
        'NU', // Nunavut
        'ON', // Ontario
        'PE', // Prince Edward Island
        'QC', // Quebec
        'SK', // Saskatchewan
        'YT', // Yukon Territory
    ];

    public $compareIdentical = true;
}
