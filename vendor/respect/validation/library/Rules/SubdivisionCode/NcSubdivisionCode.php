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
 * Validator for New Caledonia subdivision code.
 *
 * ISO 3166-1 alpha-2: NC
 *
 * @link http://www.geonames.org/NC/administrative-division-new-caledonia.html
 */
class NcSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'L', // Iles Loyaute
        'N', // Nord
        'S', // Sud
    ];

    public $compareIdentical = true;
}
