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
 * Validator for Syria subdivision code.
 *
 * ISO 3166-1 alpha-2: SY
 *
 * @link http://www.geonames.org/SY/administrative-division-syria.html
 */
class SySubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'DI', // Dimashq
        'DR', // Dara
        'DY', // Dayr az Zawr
        'HA', // Al Hasakah
        'HI', // Hims
        'HL', // Halab
        'HM', // Hamah
        'ID', // Idlib
        'LA', // Al Ladhiqiyah
        'QU', // Al Qunaytirah
        'RA', // Ar Raqqah
        'RD', // Rif Dimashq
        'SU', // As Suwayda
        'TA', // Tartus
    ];

    public $compareIdentical = true;
}
