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
 * Validator for Bolivia subdivision code.
 *
 * ISO 3166-1 alpha-2: BO
 *
 * @link http://www.geonames.org/BO/administrative-division-bolivia.html
 */
class BoSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'B', // Departmento Beni
        'C', // Departmento Cochabamba
        'H', // Departmento Chuquisaca
        'L', // Departmento La Paz
        'N', // Departmento Pando
        'O', // Departmento Oruro
        'P', // Departmento Potosi
        'S', // Departmento Santa Cruz
        'T', // Departmento Tarija
    ];

    public $compareIdentical = true;
}
