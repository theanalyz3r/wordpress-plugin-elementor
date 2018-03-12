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
 * Validator for Cook Islands subdivision code.
 *
 * ISO 3166-1 alpha-2: CK
 *
 * @link http://www.geonames.org/CK/administrative-division-cook-islands.html
 */
class CkSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'AI', // Aitutaki
        'AT', // Atiu
        'MA', // Manuae
        'MG', // Mangaia
        'MK', // Manihiki
        'MT', // Mitiaro
        'MU', // Mauke
        'NI', // Nassau Island
        'PA', // Palmerston
        'PE', // Penrhyn
        'PU', // Pukapuka
        'RK', // Rakahanga
        'RR', // Rarotonga
        'SU', // Surwarrow
        'TA', // Takutea
    ];

    public $compareIdentical = true;
}
