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
 * Validator for Micronesia subdivision code.
 *
 * ISO 3166-1 alpha-2: FM
 *
 * @link http://www.geonames.org/FM/administrative-division-micronesia.html
 */
class FmSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'KSA', // Kosrae
        'PNI', // Pohnpei
        'TRK', // Chuuk
        'YAP', // Yap
    ];

    public $compareIdentical = true;
}
