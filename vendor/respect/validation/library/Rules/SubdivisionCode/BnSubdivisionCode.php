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
 * Validator for Brunei subdivision code.
 *
 * ISO 3166-1 alpha-2: BN
 *
 * @link http://www.geonames.org/BN/administrative-division-brunei.html
 */
class BnSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'BE', // Belait
        'BM', // Brunei and Muara
        'TE', // Temburong
        'TU', // Tutong
    ];

    public $compareIdentical = true;
}
