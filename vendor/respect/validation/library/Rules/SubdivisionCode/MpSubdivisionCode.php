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
 * Validator for Northern Mariana Islands subdivision code.
 *
 * ISO 3166-1 alpha-2: MP
 *
 * @link http://www.geonames.org/MP/administrative-division-northern-mariana-islands.html
 */
class MpSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'N', // Northern Islands
        'R', // Rota
        'S', // Saipan
        'T', // Tinian
    ];

    public $compareIdentical = true;
}
