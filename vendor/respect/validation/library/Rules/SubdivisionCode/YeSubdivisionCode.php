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
 * Validator for Yemen subdivision code.
 *
 * ISO 3166-1 alpha-2: YE
 *
 * @link http://www.geonames.org/YE/administrative-division-yemen.html
 */
class YeSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'AB', // Abyan
        'AD', // Adan
        'AM', // Amran
        'BA', // Al Bayda
        'DA', // Ad Dali
        'DH', // Dhamar
        'HD', // Hadramawt
        'HJ', // Hajjah
        'HU', // Al Hudaydah
        'IB', // Ibb
        'JA', // Al Jawf
        'LA', // Lahij
        'MA', // Ma'rib
        'MR', // Al Mahrah
        'MW', // Al Mahwit
        'RA', // Raymah
        'SA', // Amanat Al Asimah
        'SD', // Sa'dah
        'SH', // Shabwah
        'SN', // San'a
        'TA', // Ta'izz
    ];

    public $compareIdentical = true;
}
