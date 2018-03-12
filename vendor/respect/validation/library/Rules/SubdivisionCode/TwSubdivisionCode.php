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
 * Validator for Taiwan subdivision code.
 *
 * ISO 3166-1 alpha-2: TW
 *
 * @link http://www.geonames.org/TW/administrative-division-taiwan.html
 */
class TwSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'CHA', // Changhua
        'CYI', // Chiayi
        'CYQ', // Chiayi
        'HSQ', // Hsinchu
        'HSZ', // Hsinchu
        'HUA', // Hualien
        'ILA', // Ilan
        'KEE', // Keelung
        'KHH', // Kaohsiung
        'MIA', // Miaoli
        'NAN', // Nantou
        'PEN', // Penghu
        'PIF', // Pingtung
        'TAO', // Taoyuan
        'TNN', // Tainan
        'TPE', // Taipei
        'TPQ', // New Taipei
        'TTT', // Taitung
        'TXG', // Taichung
        'YUN', // Yunlin
        'TXQ', // Taichung County
    ];

    public $compareIdentical = true;
}
