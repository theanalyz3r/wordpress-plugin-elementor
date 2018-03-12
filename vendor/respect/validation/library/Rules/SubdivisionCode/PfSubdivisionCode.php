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
 * Validator for French Polynesia subdivision code.
 *
 * ISO 3166-1 alpha-2: PF
 *
 * @link http://www.geonames.org/PF/administrative-division-french-polynesia.html
 */
class PfSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'I', // Austral Islands
        'M', // Marquesas Islands
        'S', // Iles Sous-le-Vent
        'T', // Tuamotu-Gambier
        'V', // Iles du Vent
    ];

    public $compareIdentical = true;
}
