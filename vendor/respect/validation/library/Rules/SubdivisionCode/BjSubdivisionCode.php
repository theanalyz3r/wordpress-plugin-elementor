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
 * Validator for Benin subdivision code.
 *
 * ISO 3166-1 alpha-2: BJ
 *
 * @link http://www.geonames.org/BJ/administrative-division-benin.html
 */
class BjSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'AK', // Atakora
        'AL', // Alibori
        'AQ', // Atlantique
        'BO', // Borgou
        'CO', // Collines
        'DO', // Donga
        'KO', // Kouffo
        'LI', // Littoral
        'MO', // Mono
        'OU', // Oueme
        'PL', // Plateau
        'ZO', // Zou
    ];

    public $compareIdentical = true;
}
