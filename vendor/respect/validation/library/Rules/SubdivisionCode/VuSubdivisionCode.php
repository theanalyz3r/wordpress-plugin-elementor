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
 * Validator for Vanuatu subdivision code.
 *
 * ISO 3166-1 alpha-2: VU
 *
 * @link http://www.geonames.org/VU/administrative-division-vanuatu.html
 */
class VuSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'MAP', // Malampa
        'PAM', // Penama
        'SAM', // Sanma
        'SEE', // Shefa
        'TAE', // Tafea
        'TOB', // Torba
    ];

    public $compareIdentical = true;
}
