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
 * Validator for North Korea subdivision code.
 *
 * ISO 3166-1 alpha-2: KP
 *
 * @link http://www.geonames.org/KP/administrative-division-north-korea.html
 */
class KpSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        '01', // P'yongyang Special City
        '02', // P'yongan-namdo
        '03', // P'yongan-bukto
        '04', // Chagang-do
        '05', // Hwanghae-namdo
        '06', // Hwanghae-bukto
        '07', // Kangwon-do
        '08', // Hamgyong-namdo
        '09', // Hamgyong-bukto
        '10', // Ryanggang-do (Yanggang-do)
        '13', // Nasŏn (Najin-Sŏnbong)
    ];

    public $compareIdentical = true;
}
