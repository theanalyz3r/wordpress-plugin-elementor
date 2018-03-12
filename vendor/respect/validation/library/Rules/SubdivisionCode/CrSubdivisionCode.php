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
 * Validator for Costa Rica subdivision code.
 *
 * ISO 3166-1 alpha-2: CR
 *
 * @link http://www.geonames.org/CR/administrative-division-costa-rica.html
 */
class CrSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'A', // Alajuela
        'C', // Cartago
        'G', // Guanacaste
        'H', // Heredia
        'L', // Limon
        'P', // Puntarenas
        'SJ', // San Jose
    ];

    public $compareIdentical = true;
}
