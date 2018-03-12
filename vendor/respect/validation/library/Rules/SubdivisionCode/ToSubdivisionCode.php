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
 * Validator for Tonga subdivision code.
 *
 * ISO 3166-1 alpha-2: TO
 *
 * @link http://www.geonames.org/TO/administrative-division-tonga.html
 */
class ToSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        '01', // Eua
        '02', // Ha'apai
        '03', // Niuas
        '04', // Tongatapu
        '05', // Vava'u
    ];

    public $compareIdentical = true;
}
