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
 * Validator for Somalia subdivision code.
 *
 * ISO 3166-1 alpha-2: SO
 *
 * @link http://www.geonames.org/SO/administrative-division-somalia.html
 */
class SoSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'AW', // Awdal
        'BK', // Bakool
        'BN', // Banaadir
        'BR', // Bari
        'BY', // Bay
        'GA', // Galguduud
        'GE', // Gedo
        'HI', // Hiiraan
        'JD', // Jubbada Dhexe
        'JH', // Jubbada Hoose
        'MU', // Mudug
        'NU', // Nugaal
        'SA', // Sanaag
        'SD', // Shabeellaha Dhexe
        'SH', // Shabeellaha Hoose
        'SO', // Sool
        'TO', // Togdheer
        'WO', // Woqooyi Galbeed
    ];

    public $compareIdentical = true;
}
