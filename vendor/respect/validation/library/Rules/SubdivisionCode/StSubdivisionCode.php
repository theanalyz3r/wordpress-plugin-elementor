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
 * Validator for São Tomé and Príncipe subdivision code.
 *
 * ISO 3166-1 alpha-2: ST
 *
 * @link http://www.geonames.org/ST/administrative-division-sao-tome-and-principe.html
 */
class StSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'P', // Principe
        'S', // Sao Tome
    ];

    public $compareIdentical = true;
}
