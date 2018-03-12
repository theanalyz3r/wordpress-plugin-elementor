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
 * Validator for Kuwait subdivision code.
 *
 * ISO 3166-1 alpha-2: KW
 *
 * @link http://www.geonames.org/KW/administrative-division-kuwait.html
 */
class KwSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'AH', // Al Ahmadi
        'FA', // Al Farwaniyah
        'HA', // Hawalli
        'JA', // Al Jahra
        'KU', // Al Asimah
        'MU', // Mubārak al Kabīr
    ];

    public $compareIdentical = true;
}
