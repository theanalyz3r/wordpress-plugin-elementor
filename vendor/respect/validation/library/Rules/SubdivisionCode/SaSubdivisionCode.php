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
 * Validator for Saudi Arabia subdivision code.
 *
 * ISO 3166-1 alpha-2: SA
 *
 * @link http://www.geonames.org/SA/administrative-division-saudi-arabia.html
 */
class SaSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        '01', // Ar Riyad
        '02', // Makkah
        '03', // Al Madinah
        '04', // Ash Sharqiyah (Eastern Province)
        '05', // Al Qasim
        '06', // Ha'il
        '07', // Tabuk
        '08', // Al Hudud ash Shamaliyah
        '09', // Jizan
        '10', // Najran
        '11', // Al Bahah
        '12', // Al Jawf
        '14', // 'Asir
    ];

    public $compareIdentical = true;
}
