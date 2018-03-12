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
 * Validator for South Sudan subdivision code.
 *
 * ISO 3166-1 alpha-2: SS
 *
 * @link http://www.geonames.org/SS/administrative-division-south-sudan.html
 */
class SsSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'BN', // Northern Bahr el Ghazal
        'BW', // Western Bahr el Ghazal
        'EC', // Central Equatoria
        'EE', // Eastern Equatoria
        'EW', // Western Equatoria
        'JG', // Jonglei
        'LK', // Lakes
        'NU', // Upper Nile
        'UY', // Unity
        'WR', // Warrap
    ];

    public $compareIdentical = true;
}
