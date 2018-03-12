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
 * Validator for Luxembourg subdivision code.
 *
 * ISO 3166-1 alpha-2: LU
 *
 * @link http://www.geonames.org/LU/administrative-division-luxembourg.html
 */
class LuSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'D', // Diekirch
        'G', // Grevenmacher
        'L', // Luxembourg
    ];

    public $compareIdentical = true;
}
