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
 * Validator for Saint Helena subdivision code.
 *
 * ISO 3166-1 alpha-2: SH
 *
 * @link http://www.geonames.org/SH/administrative-division-saint-helena.html
 */
class ShSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'AC', // Ascension
        'HL', // Saint Helena
        'TA', // Tristan da Cunha
    ];

    public $compareIdentical = true;
}
