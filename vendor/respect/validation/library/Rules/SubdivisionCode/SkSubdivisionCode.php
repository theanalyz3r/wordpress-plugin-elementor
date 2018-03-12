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
 * Validator for Slovakia subdivision code.
 *
 * ISO 3166-1 alpha-2: SK
 *
 * @link http://www.geonames.org/SK/administrative-division-slovakia.html
 */
class SkSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'BC', // Banskobystricky
        'BL', // Bratislavsky
        'KI', // Kosicky
        'NI', // Nitriansky
        'PV', // Presovsky
        'TA', // Trnavsky
        'TC', // Trenciansky
        'ZI', // Zilinsky
    ];

    public $compareIdentical = true;
}
