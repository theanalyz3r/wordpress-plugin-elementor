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
 * Validator for Samoa subdivision code.
 *
 * ISO 3166-1 alpha-2: WS
 *
 * @link http://www.geonames.org/WS/administrative-division-samoa.html
 */
class WsSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'AA', // A'ana
        'AL', // Aiga-i-le-Tai
        'AT', // Atua
        'FA', // Fa'asaleleaga
        'GE', // Gaga'emauga
        'GI', // Gagaifomauga
        'PA', // Palauli
        'SA', // Satupa'itea
        'TU', // Tuamasaga
        'VF', // Va'a-o-Fonoti
        'VS', // Vaisigano
    ];

    public $compareIdentical = true;
}
