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
 * Validator for Germany subdivision code.
 *
 * ISO 3166-1 alpha-2: DE
 *
 * @link http://www.geonames.org/DE/administrative-division-germany.html
 */
class DeSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'BB', // Brandenburg
        'BE', // Berlin
        'BW', // Baden-Württemberg
        'BY', // Bayern
        'HB', // Bremen
        'HE', // Hessen
        'HH', // Hamburg
        'MV', // Mecklenburg-Vorpommern
        'NI', // Niedersachsen
        'NW', // Nordrhein-Westfalen
        'RP', // Rheinland-Pfalz
        'SH', // Schleswig-Holstein
        'SL', // Saarland
        'SN', // Sachsen
        'ST', // Sachsen-Anhalt
        'TH', // Thüringen
    ];

    public $compareIdentical = true;
}
