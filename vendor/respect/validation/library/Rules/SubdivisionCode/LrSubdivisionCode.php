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
 * Validator for Liberia subdivision code.
 *
 * ISO 3166-1 alpha-2: LR
 *
 * @link http://www.geonames.org/LR/administrative-division-liberia.html
 */
class LrSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'BG', // Bong
        'BM', // Bomi
        'CM', // Grand Cape Mount
        'GB', // Grand Bassa
        'GG', // Grand Gedeh
        'GK', // Grand Kru
        'LO', // Lofa
        'MG', // Margibi
        'MO', // Montserrado
        'MY', // Maryland
        'NI', // Nimba
        'RI', // River Cess
        'SI', // Sinoe
    ];

    public $compareIdentical = true;
}
