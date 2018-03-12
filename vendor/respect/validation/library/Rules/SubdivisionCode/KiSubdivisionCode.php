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
 * Validator for Kiribati subdivision code.
 *
 * ISO 3166-1 alpha-2: KI
 *
 * @link http://www.geonames.org/KI/administrative-division-kiribati.html
 */
class KiSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'G', // Gilbert Islands
        'L', // Line Islands
        'P', // Phoenix Islands
    ];

    public $compareIdentical = true;
}
