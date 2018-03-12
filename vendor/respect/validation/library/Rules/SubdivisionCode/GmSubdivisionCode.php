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
 * Validator for Gambia subdivision code.
 *
 * ISO 3166-1 alpha-2: GM
 *
 * @link http://www.geonames.org/GM/administrative-division-gambia.html
 */
class GmSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'B', // Banjul
        'L', // Lower River
        'M', // Central River
        'N', // North Bank
        'U', // Upper River
        'W', // Western
    ];

    public $compareIdentical = true;
}
