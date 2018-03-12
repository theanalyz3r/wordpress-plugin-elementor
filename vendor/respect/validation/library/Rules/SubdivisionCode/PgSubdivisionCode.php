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
 * Validator for Papua New Guinea subdivision code.
 *
 * ISO 3166-1 alpha-2: PG
 *
 * @link http://www.geonames.org/PG/administrative-division-papua-new-guinea.html
 */
class PgSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'CPK', // Chimbu
        'CPM', // Central
        'EBR', // East New Britain
        'EHG', // Eastern Highlands
        'EPW', // Enga
        'ESW', // East Sepik
        'GPK', // Gulf
        'MBA', // Milne Bay
        'MPL', // Morobe
        'MPM', // Madang
        'MRL', // Manus
        'NCD', // National Capital
        'NIK', // New Ireland
        'NPP', // Northern
        'NSA', // Bougainville
        'SAN', // Sandaun
        'SHM', // Southern Highlands
        'WBK', // West New Britain
        'WHM', // Western Highlands
        'WPD', // Western
    ];

    public $compareIdentical = true;
}
