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
 * Validator for Tajikistan subdivision code.
 *
 * ISO 3166-1 alpha-2: TJ
 *
 * @link http://www.geonames.org/TJ/administrative-division-tajikistan.html
 */
class TjSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'GB', // Gorno-Badakhstan
        'KT', // Khatlon
        'SU', // Sughd
    ];

    public $compareIdentical = true;
}
