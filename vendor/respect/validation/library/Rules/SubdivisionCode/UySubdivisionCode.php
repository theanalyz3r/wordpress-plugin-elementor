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
 * Validator for Uruguay subdivision code.
 *
 * ISO 3166-1 alpha-2: UY
 *
 * @link http://www.geonames.org/UY/administrative-division-uruguay.html
 */
class UySubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'AR', // Artigas
        'CA', // Canelones
        'CL', // Cerro Largo
        'CO', // Colonia
        'DU', // Durazno
        'FD', // Florida
        'FS', // Flores
        'LA', // Lavalleja
        'MA', // Maldonado
        'MO', // Montevideo
        'PA', // Paysandu
        'RN', // Rio Negro
        'RO', // Rocha
        'RV', // Rivera
        'SA', // Salto
        'SJ', // San Jose
        'SO', // Soriano
        'TA', // Tacuarembó
        'TT', // Treinta y Tres
    ];

    public $compareIdentical = true;
}
