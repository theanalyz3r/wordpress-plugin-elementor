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
 * Validator for Cyprus subdivision code.
 *
 * ISO 3166-1 alpha-2: CY
 *
 * @link http://www.geonames.org/CY/administrative-division-cyprus.html
 */
class CySubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        '01', // Lefkosía
        '02', // Lemesós
        '03', // Lárnaka
        '04', // Ammóchostos
        '05', // Páfos
        '06', // Kerýneia
    ];

    public $compareIdentical = true;
}
