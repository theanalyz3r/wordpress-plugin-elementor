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
 * Validator for Lebanon subdivision code.
 *
 * ISO 3166-1 alpha-2: LB
 *
 * @link http://www.geonames.org/LB/administrative-division-lebanon.html
 */
class LbSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'AK', // Aakkâr
        'AS', // Liban-Nord
        'BA', // Beyrouth
        'BH', // Baalbek-Hermel
        'BI', // Béqaa
        'JA', // Liban-Sud
        'JL', // Mont-Liban
        'NA', // Nabatîyé
    ];

    public $compareIdentical = true;
}
