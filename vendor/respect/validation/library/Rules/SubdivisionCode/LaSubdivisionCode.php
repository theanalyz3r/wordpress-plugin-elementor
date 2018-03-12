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
 * Validator for Laos subdivision code.
 *
 * ISO 3166-1 alpha-2: LA
 *
 * @link http://www.geonames.org/LA/administrative-division-laos.html
 */
class LaSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'AT', // Attapu
        'BK', // Bokeo
        'BL', // Bolikhamxai
        'CH', // Champasak
        'HO', // Houaphan
        'KH', // Khammouan
        'LM', // Louang Namtha
        'LP', // Louangphabang
        'OU', // Oudomxai
        'PH', // Phongsali
        'SL', // Salavan
        'SV', // Savannakhet
        'VI', // Vientiane
        'VT', // Vientiane
        'XA', // Xaignabouli
        'XE', // Xekong
        'XI', // Xiangkhoang
        'XN', // Xaisomboun
    ];

    public $compareIdentical = true;
}
