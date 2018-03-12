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
 * Validator for Eritrea subdivision code.
 *
 * ISO 3166-1 alpha-2: ER
 *
 * @link http://www.geonames.org/ER/administrative-division-eritrea.html
 */
class ErSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'AN', // Anseba (Keren)
        'DK', // Southern Red Sea (Debub-Keih-Bahri)
        'DU', // Southern (Debub)
        'GB', // Gash-Barka (Barentu)
        'MA', // Central (Maekel)
        'SK', // Northern Red Sea (Semien-Keih-Bahri)
    ];

    public $compareIdentical = true;
}
