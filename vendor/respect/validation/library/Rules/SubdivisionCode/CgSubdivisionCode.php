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
 * Validator for Republic of the Congo subdivision code.
 *
 * ISO 3166-1 alpha-2: CG
 *
 * @link http://www.geonames.org/CG/administrative-division-republic-of-the-congo.html
 */
class CgSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        '11', // Bouenza
        '12', // Pool
        '13', // Sangha
        '14', // Plateaux
        '15', // Cuvette-Ouest
        '16', // Pointe-Noire
        '2', // Lekoumou
        '5', // Kouilou
        '7', // Likouala
        '8', // Cuvette
        '9', // Niari
        'BZV', // Brazzaville
    ];

    public $compareIdentical = true;
}
