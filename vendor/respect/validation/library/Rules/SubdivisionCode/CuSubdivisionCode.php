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
 * Validator for Cuba subdivision code.
 *
 * ISO 3166-1 alpha-2: CU
 *
 * @link http://www.geonames.org/CU/administrative-division-cuba.html
 */
class CuSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        '01', // Pinar del Rio
        '03', // La Habana
        '04', // Matanzas
        '05', // Villa Clara
        '06', // Cienfuegos
        '07', // Sancti Spiritus
        '08', // Ciego de Avila
        '09', // Camaguey
        '10', // Las Tunas
        '11', // Holguin
        '12', // Granma
        '13', // Santiago de Cuba
        '14', // Guantanamo
        '15', // Artemisa
        '16', // Mayabeque
        '99', // Isla de la Juventud
    ];

    public $compareIdentical = true;
}
