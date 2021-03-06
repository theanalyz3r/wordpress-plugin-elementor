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
 * Validator for U.S. Minor Outlying Islands subdivision code.
 *
 * ISO 3166-1 alpha-2: UM
 *
 * @link http://www.geonames.org/UM/administrative-division-united-states-minor-outlying-islands.html
 */
class UmSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        '67', // Johnston Atoll
        '71', // Midway Atoll
        '76', // Navassa Island
        '79', // Wake Island
        '81', // Baker Island
        '84', // Howland Island
        '86', // Jarvis Island
        '89', // Kingman Reef
        '95', // Palmyra Atoll
    ];

    public $compareIdentical = true;
}
