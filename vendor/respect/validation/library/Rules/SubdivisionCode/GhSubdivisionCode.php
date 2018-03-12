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
 * Validator for Ghana subdivision code.
 *
 * ISO 3166-1 alpha-2: GH
 *
 * @link http://www.geonames.org/GH/administrative-division-ghana.html
 */
class GhSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'AA', // Greater Accra Region
        'AH', // Ashanti Region
        'BA', // Brong-Ahafo Region
        'CP', // Central Region
        'EP', // Eastern Region
        'NP', // Northern Region
        'TV', // Volta Region
        'UE', // Upper East Region
        'UW', // Upper West Region
        'WP', // Western Region
    ];

    public $compareIdentical = true;
}
