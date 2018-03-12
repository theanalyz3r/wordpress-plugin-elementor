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
 * Validator for Bahrain subdivision code.
 *
 * ISO 3166-1 alpha-2: BH
 *
 * @link http://www.geonames.org/BH/administrative-division-bahrain.html
 */
class BhSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        '13', // Capital
        '14', // Southern
        '15', // Muharraq
        '16', // Central
        '17', // Northern
    ];

    public $compareIdentical = true;
}
