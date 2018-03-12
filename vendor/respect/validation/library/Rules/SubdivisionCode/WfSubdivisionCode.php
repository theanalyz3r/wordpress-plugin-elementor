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
 * Validator for Wallis and Futuna subdivision code.
 *
 * ISO 3166-1 alpha-2: WF
 *
 * @link http://www.geonames.org/WF/administrative-division-wallis-and-futuna.html
 */
class WfSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'A', // Alo
        'S', // Sigave
        'W', // ʻUvea
    ];

    public $compareIdentical = true;
}
