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
 * Validator for Solomon Islands subdivision code.
 *
 * ISO 3166-1 alpha-2: SB
 *
 * @link http://www.geonames.org/SB/administrative-division-solomon-islands.html
 */
class SbSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'CE', // Central
        'CH', // Choiseul
        'CT', // Capital Territory
        'GU', // Guadalcanal
        'IS', // Isabel
        'MK', // Makira
        'ML', // Malaita
        'RB', // Rennell and Bellona
        'TE', // Temotu
        'WE', // Western
    ];

    public $compareIdentical = true;
}
