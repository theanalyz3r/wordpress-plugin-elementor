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
 * Validator for British Indian Ocean Territory subdivision code.
 *
 * ISO 3166-1 alpha-2: IO
 *
 * @link http://www.geonames.org/IO/administrative-division-british-indian-ocean-territory.html
 */
class IoSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'DG', // Diego Garcia
        'DI', // Danger Island
        'EA', // Eagle Islands
        'EG', // Egmont Islands
        'NI', // Nelsons Island
        'PB', // Peros Banhos
        'SI', // Salomon Islands
        'TB', // Three Brothers
    ];

    public $compareIdentical = true;
}
