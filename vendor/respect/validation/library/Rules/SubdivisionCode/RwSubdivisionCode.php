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
 * Validator for Rwanda subdivision code.
 *
 * ISO 3166-1 alpha-2: RW
 *
 * @link http://www.geonames.org/RW/administrative-division-rwanda.html
 */
class RwSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        '01', // Kigali
        '02', // Est
        '03', // Nord
        '04', // Ouest
        '05', // Sud
    ];

    public $compareIdentical = true;
}
