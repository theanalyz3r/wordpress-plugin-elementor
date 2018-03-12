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
 * Validator for Cayman Islands subdivision code.
 *
 * ISO 3166-1 alpha-2: KY
 *
 * @link http://www.geonames.org/KY/administrative-division-cayman-islands.html
 */
class KySubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'CR', // Creek
        'EA', // Eastern
        'ML', // Midland
        'SK', // Stake Bay
        'SP', // Spot Bay
        'ST', // South Town
        'WD', // West End
        'WN', // Western
    ];

    public $compareIdentical = true;
}
