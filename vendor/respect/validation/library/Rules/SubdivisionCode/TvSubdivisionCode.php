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
 * Validator for Tuvalu subdivision code.
 *
 * ISO 3166-1 alpha-2: TV
 *
 * @link http://www.geonames.org/TV/administrative-division-tuvalu.html
 */
class TvSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'FUN', // Funafuti
        'NIT', // Niutao
        'NKF', // Nukufetau
        'NKL', // Nukulaelae
        'NMA', // Nanumea
        'NMG', // Nanumanga
        'NUI', // Nui
        'VAI', // Vaitupu
    ];

    public $compareIdentical = true;
}
