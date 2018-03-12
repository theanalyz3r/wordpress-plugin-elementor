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
 * Validator for Mozambique subdivision code.
 *
 * ISO 3166-1 alpha-2: MZ
 *
 * @link http://www.geonames.org/MZ/administrative-division-mozambique.html
 */
class MzSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'A', // Niassa
        'B', // Manica
        'G', // Gaza
        'I', // Inhambane
        'L', // Maputo
        'MPM', // Maputo (city)
        'N', // Nampula
        'P', // Cabo Delgado
        'Q', // Zambezia
        'S', // Sofala
        'T', // Tete
    ];

    public $compareIdentical = true;
}
