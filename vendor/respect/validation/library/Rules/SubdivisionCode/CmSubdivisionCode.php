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
 * Validator for Cameroon subdivision code.
 *
 * ISO 3166-1 alpha-2: CM
 *
 * @link http://www.geonames.org/CM/administrative-division-cameroon.html
 */
class CmSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'AD', // Adamawa Province (Adamaoua)
        'CE', // Centre Province
        'EN', // Extreme North Province (Extrême-Nord)
        'ES', // East Province (Est)
        'LT', // Littoral Province
        'NO', // North Province (Nord)
        'NW', // Northwest Province (Nord-Ouest)
        'OU', // West Province (Ouest)
        'SU', // South Province (Sud)
        'SW', // Southwest Province (Sud-Ouest).
    ];

    public $compareIdentical = true;
}
