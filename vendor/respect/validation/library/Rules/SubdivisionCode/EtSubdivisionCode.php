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
 * Validator for Ethiopia subdivision code.
 *
 * ISO 3166-1 alpha-2: ET
 *
 * @link http://www.geonames.org/ET/administrative-division-ethiopia.html
 */
class EtSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'AA', // Addis Ababa
        'AF', // Afar
        'AM', // Amhara
        'BE', // Benishangul-Gumaz
        'DD', // Dire Dawa
        'GA', // Gambela
        'HA', // Hariai
        'OR', // Oromia
        'SN', // Southern Nations - Nationalities and Peoples Region
        'SO', // Somali
        'TI', // Tigray
    ];

    public $compareIdentical = true;
}
