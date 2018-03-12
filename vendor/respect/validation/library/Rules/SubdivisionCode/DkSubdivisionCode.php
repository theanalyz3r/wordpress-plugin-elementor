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
 * Validator for Denmark subdivision code.
 *
 * ISO 3166-1 alpha-2: DK
 *
 * @link http://www.geonames.org/DK/administrative-division-denmark.html
 */
class DkSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        '81', // Region Nordjylland
        '82', // Region Midtjylland
        '83', // Region Syddanmark
        '84', // Region Hovedstaden
        '85', // Region Sjæland
    ];

    public $compareIdentical = true;
}
