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
 * Validator for Oman subdivision code.
 *
 * ISO 3166-1 alpha-2: OM
 *
 * @link http://www.geonames.org/OM/administrative-division-oman.html
 */
class OmSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'BA', // Al Batinah South
        'BU', // Al Buraymī
        'DA', // Ad Dakhiliyah
        'MA', // Masqat
        'MU', // Musandam
        'SH', // Ash Sharqiyah South
        'WU', // Al Wusta
        'ZA', // Az Zahirah
        'ZU', // Zufar
    ];

    public $compareIdentical = true;
}
