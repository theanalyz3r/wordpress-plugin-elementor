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
 * Validator for Tokelau subdivision code.
 *
 * ISO 3166-1 alpha-2: TK
 *
 * @link http://www.geonames.org/TK/administrative-division-tokelau.html
 */
class TkSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'A', // Atafu
        'F', // Fakaofo
        'N', // Nukunonu
    ];

    public $compareIdentical = true;
}
