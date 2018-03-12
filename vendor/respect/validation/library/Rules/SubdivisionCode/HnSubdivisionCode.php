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
 * Validator for Honduras subdivision code.
 *
 * ISO 3166-1 alpha-2: HN
 *
 * @link http://www.geonames.org/HN/administrative-division-honduras.html
 */
class HnSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'AT', // Atlantida
        'CH', // Choluteca
        'CL', // Colon
        'CM', // Comayagua
        'CP', // Copan
        'CR', // Cortes
        'EP', // El Paraiso
        'FM', // Francisco Morazan
        'GD', // Gracias a Dios
        'IB', // Islas de la Bahia (Bay Islands)
        'IN', // Intibuca
        'LE', // Lempira
        'LP', // La Paz
        'OC', // Ocotepeque
        'OL', // Olancho
        'SB', // Santa Barbara
        'VA', // Valle
        'YO', // Yoro
    ];

    public $compareIdentical = true;
}
