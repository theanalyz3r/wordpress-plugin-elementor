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
 * Validator for Senegal subdivision code.
 *
 * ISO 3166-1 alpha-2: SN
 *
 * @link http://www.geonames.org/SN/administrative-division-senegal.html
 */
class SnSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'DB', // Diourbel
        'DK', // Dakar
        'FK', // Fatick
        'KA', // Kaffrine
        'KD', // Kolda
        'KE', // Kédougou
        'KL', // Kaolack
        'LG', // Louga
        'MT', // Matam
        'SE', // Sédhiou
        'SL', // Saint-Louis
        'TC', // Tambacounda
        'TH', // Thies
        'ZG', // Ziguinchor
    ];

    public $compareIdentical = true;
}
