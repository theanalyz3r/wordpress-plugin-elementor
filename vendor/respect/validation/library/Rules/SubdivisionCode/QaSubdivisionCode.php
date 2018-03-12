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
 * Validator for Qatar subdivision code.
 *
 * ISO 3166-1 alpha-2: QA
 *
 * @link http://www.geonames.org/QA/administrative-division-qatar.html
 */
class QaSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'DA', // Ad Dawhah
        'KH', // Al Khawr wa adh Dhakhīrah
        'MS', // Ash Shamāl
        'RA', // Ar Rayyan
        'US', // Umm Salal
        'WA', // Al Wakrah
        'ZA', // Az Z a‘āyin
    ];

    public $compareIdentical = true;
}
