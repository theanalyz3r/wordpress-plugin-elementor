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
 * Validator for Uzbekistan subdivision code.
 *
 * ISO 3166-1 alpha-2: UZ
 *
 * @link http://www.geonames.org/UZ/administrative-division-uzbekistan.html
 */
class UzSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'AN', // Andijon
        'BU', // Buxoro
        'FA', // Farg'ona
        'JI', // Jizzax
        'NG', // Namangan
        'NW', // Navoiy
        'QA', // Qashqadaryo
        'QR', // Qoraqalpog'iston Republikasi
        'SA', // Samarqand
        'SI', // Sirdaryo
        'SU', // Surxondaryo
        'TK', // Toshkent city
        'TO', // Toshkent region
        'XO', // Xorazm
    ];

    public $compareIdentical = true;
}
