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
 * Validator for United Arab Emirates subdivision code.
 *
 * ISO 3166-1 alpha-2: AE
 *
 * @link http://www.geonames.org/AE/administrative-division-united-arab-emirates.html
 */
class AeSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'AJ', // 'Ajman
        'AZ', // Abu Zaby
        'DU', // Dubayy
        'FU', // Al Fujayrah
        'RK', // R'as al Khaymah
        'SH', // Ash Shariqah
        'UQ', // Umm al Qaywayn
    ];

    public $compareIdentical = true;
}
