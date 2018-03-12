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
 * Validator for Norway subdivision code.
 *
 * ISO 3166-1 alpha-2: NO
 *
 * @link http://www.geonames.org/NO/administrative-division-norway.html
 */
class NoSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        '01', // Ostfold
        '02', // Akershus
        '03', // Oslo
        '04', // Hedmark
        '05', // Oppland
        '06', // Buskerud
        '07', // Vestfold
        '08', // Telemark
        '09', // Aust-Agder
        '10', // Vest-Agder
        '11', // Rogaland
        '12', // Hordaland
        '14', // Sogn og Fjordane
        '15', // More og Romdal
        '16', // Sor-Trondelag
        '17', // Nord-Trondelag
        '18', // Nordland
        '19', // Troms
        '20', // Finnmark
        '21', // Svalbard
        '22', // Jan Mayen
    ];

    public $compareIdentical = true;
}
