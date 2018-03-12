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
 * Validator for U.S. Virgin Islands subdivision code.
 *
 * ISO 3166-1 alpha-2: VI
 *
 * @link http://www.geonames.org/VI/administrative-division-u-s-virgin-islands.html
 */
class ViSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'C', // Saint Croix
        'J', // Saint John
        'T', // Saint Thomas
    ];

    public $compareIdentical = true;
}
