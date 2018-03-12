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
 * Validator for Myanmar [Burma] subdivision code.
 *
 * ISO 3166-1 alpha-2: MM
 *
 * @link http://www.geonames.org/MM/administrative-division-myanmar.html
 */
class MmSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        '01', // Sagaing
        '02', // Bago
        '03', // Magway
        '04', // Mandalay
        '05', // Tanintharyi
        '06', // Yangon
        '07', // Ayeyarwady
        '11', // Kachin State
        '12', // Kayah State
        '13', // Kayin State
        '14', // Chin State
        '15', // Mon State
        '16', // Rakhine State
        '17', // Shan State
    ];

    public $compareIdentical = true;
}
