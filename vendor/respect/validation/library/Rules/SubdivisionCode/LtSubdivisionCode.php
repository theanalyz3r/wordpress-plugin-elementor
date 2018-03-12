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
 * Validator for Lithuania subdivision code.
 *
 * ISO 3166-1 alpha-2: LT
 *
 * @link http://www.geonames.org/LT/administrative-division-lithuania.html
 */
class LtSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'AL', // Alytus
        'KL', // Klaipeda
        'KU', // Kaunas
        'MR', // Marijampole
        'PN', // Panevezys
        'SA', // Siauliai
        'TA', // Taurage
        'TE', // Telsiai
        'UT', // Utena
        'VL', // Vilnius
    ];

    public $compareIdentical = true;
}
