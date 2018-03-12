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
 * Validator for Austria subdivision code.
 *
 * ISO 3166-1 alpha-2: AT
 *
 * @link http://www.geonames.org/AT/administrative-division-austria.html
 */
class AtSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        '1', // Burgenland
        '2', // Karnten
        '3', // Niederosterreich
        '4', // Oberosterreich
        '5', // Salzburg
        '6', // Steiermark
        '7', // Tirol
        '8', // Vorarlberg
        '9', // Wien
    ];

    public $compareIdentical = true;
}
