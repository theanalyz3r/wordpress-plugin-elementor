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
 * Validator for Andorra subdivision code.
 *
 * ISO 3166-1 alpha-2: AD
 *
 * @link http://www.geonames.org/AD/administrative-division-andorra.html
 */
class AdSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        '02', // Canillo
        '03', // Encamp
        '04', // La Massana
        '05', // Ordino
        '06', // Sant Julia de Lòria
        '07', // Andorra la Vella
        '08', // Escaldes-Engordany
    ];

    public $compareIdentical = true;
}
