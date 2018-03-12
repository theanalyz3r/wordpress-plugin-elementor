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
 * Validator for Cocos [Keeling] Islands subdivision code.
 *
 * ISO 3166-1 alpha-2: CC
 *
 * @link http://www.geonames.org/CC/administrative-division-cocos-islands.html
 */
class CcSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'D', // Direction Island
        'H', // Home Island
        'O', // Horsburgh Island
        'S', // South Island
        'W', // West Island
    ];

    public $compareIdentical = true;
}
