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
 * Validator for Poland subdivision code.
 *
 * ISO 3166-1 alpha-2: PL
 *
 * @link http://www.geonames.org/PL/administrative-division-poland.html
 */
class PlSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'DS', // Dolnoslaskie
        'KP', // Kujawsko-Pomorskie
        'LB', // Lubuskie
        'LD', // Lodzkie
        'LU', // Lubelskie
        'MA', // Malopolskie
        'MZ', // Mazowieckie
        'OP', // Opolskie
        'PD', // Podlaskie
        'PK', // Podkarpackie
        'PM', // Pomorskie
        'SK', // Swietokrzyskie
        'SL', // Slaskie
        'WN', // Warminsko-Mazurskie
        'WP', // Wielkopolskie
        'ZP', // Zachodniopomorskie
    ];

    public $compareIdentical = true;
}
