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
 * Validator for Svalbard and Jan Mayen subdivision code.
 *
 * ISO 3166-1 alpha-2: SJ
 *
 * @link http://www.geonames.org/SJ/administrative-division-svalbard-and-jan-mayen.html
 */
class SjSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        '21', // Svalbard
        '22', // Jan Mayen
    ];

    public $compareIdentical = true;
}
