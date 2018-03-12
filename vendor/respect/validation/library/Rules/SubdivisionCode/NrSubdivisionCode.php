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
 * Validator for Nauru subdivision code.
 *
 * ISO 3166-1 alpha-2: NR
 *
 * @link http://www.geonames.org/NR/administrative-division-nauru.html
 */
class NrSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        '01', // Aiwo
        '02', // Anabar
        '03', // Anetan
        '04', // Anibare
        '05', // Baiti
        '06', // Boe
        '07', // Buada
        '08', // Denigomodu
        '09', // Ewa
        '10', // Ijuw
        '11', // Meneng
        '12', // Nibok
        '13', // Uaboe
        '14', // Yaren
    ];

    public $compareIdentical = true;
}
