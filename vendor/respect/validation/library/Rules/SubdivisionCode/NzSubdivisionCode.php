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
 * Validator for New Zealand subdivision code.
 *
 * ISO 3166-1 alpha-2: NZ
 *
 * @link http://www.geonames.org/NZ/administrative-division-new-zealand.html
 */
class NzSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'N', // North Island
        'S', // South Island
        'AUK', // Auckland
        'BOP', // Bay of Plenty
        'CAN', // Canterbury
        'CIT', // Chatham Islands
        'GIS', // Gisborne
        'HKB', // Hawke's Bay
        'MBH', // Marlborough
        'MWT', // Manawatu-Wanganui
        'NSN', // Nelson
        'NTL', // Northland
        'OTA', // Otago
        'STL', // Southland
        'TAS', // Tasman
        'TKI', // Taranaki
        'WGN', // Wellington
        'WKO', // Waikato
        'WTC', // West Coast
    ];

    public $compareIdentical = true;
}
