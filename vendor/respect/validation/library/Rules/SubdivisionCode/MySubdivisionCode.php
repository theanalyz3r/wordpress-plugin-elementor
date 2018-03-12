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
 * Validator for Malaysia subdivision code.
 *
 * ISO 3166-1 alpha-2: MY
 *
 * @link http://www.geonames.org/MY/administrative-division-malaysia.html
 */
class MySubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        '01', // Johor
        '02', // Kedah
        '03', // Kelantan
        '04', // Melaka
        '05', // Negeri Sembilan
        '06', // Pahang
        '07', // Pinang
        '08', // Perak
        '09', // Perlis
        '10', // Selangor
        '11', // Terengganu
        '12', // Sabah
        '13', // Sarawak
        '14', // Kuala Lumpur
        '15', // Labuan
        '16', // Putrajaya
    ];

    public $compareIdentical = true;
}
