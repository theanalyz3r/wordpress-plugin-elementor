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
 * Validator for Niger subdivision code.
 *
 * ISO 3166-1 alpha-2: NE
 *
 * @link http://www.geonames.org/NE/administrative-division-niger.html
 */
class NeSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        '1', // Agadez
        '2', // Diffa
        '3', // Dosso
        '4', // Maradi
        '5', // Tahoua
        '6', // Tillabéri
        '7', // Zinder
        '8', // Niamey
    ];

    public $compareIdentical = true;
}
