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
 * Validator for Guinea-Bissau subdivision code.
 *
 * ISO 3166-1 alpha-2: GW
 *
 * @link http://www.geonames.org/GW/administrative-division-guinea-bissau.html
 */
class GwSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'L', // Leste
        'N', // Norte
        'S', // Sul
        'BA', // Bafata Region
        'BL', // Bolama Region
        'BM', // Biombo Region
        'BS', // Bissau Region
        'CA', // Cacheu Region
        'GA', // Gabu Region
        'OI', // Oio Region
        'QU', // Quinara Region
        'TO', // Tombali Region
    ];

    public $compareIdentical = true;
}
