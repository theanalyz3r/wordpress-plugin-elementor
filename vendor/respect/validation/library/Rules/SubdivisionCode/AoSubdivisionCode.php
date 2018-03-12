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
 * Validator for Angola subdivision code.
 *
 * ISO 3166-1 alpha-2: AO
 *
 * @link http://www.geonames.org/AO/administrative-division-angola.html
 */
class AoSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'BGO', // Bengo
        'BGU', // Benguela province
        'BIE', // Bie
        'CAB', // Cabinda
        'CCU', // Cuando-Cubango
        'CNN', // Cunene
        'CNO', // Cuanza Norte
        'CUS', // Cuanza Sul
        'HUA', // Huambo province
        'HUI', // Huila province
        'LNO', // Lunda Norte
        'LSU', // Lunda Sul
        'LUA', // Luanda
        'MAL', // Malange
        'MOX', // Moxico
        'NAM', // Namibe
        'UIG', // Uige
        'ZAI', // Zaire
    ];

    public $compareIdentical = true;
}
