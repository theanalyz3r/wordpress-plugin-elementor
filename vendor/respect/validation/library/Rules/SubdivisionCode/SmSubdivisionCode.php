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
 * Validator for San Marino subdivision code.
 *
 * ISO 3166-1 alpha-2: SM
 *
 * @link http://www.geonames.org/SM/administrative-division-san-marino.html
 */
class SmSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        '01', // Acquaviva
        '02', // Chiesanuova
        '03', // Domagnano
        '04', // Faetano
        '05', // Fiorentino
        '06', // Borgo Maggiore
        '07', // Citta di San Marino
        '08', // Montegiardino
        '09', // Serravalle
    ];

    public $compareIdentical = true;
}
