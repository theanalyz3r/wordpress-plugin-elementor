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
 * Validator for Serbia And Montenegro subdivision code.
 *
 * ISO 3166-1 alpha-2: CS
 *
 * @link http://www.geonames.org/CS/administrative-division-serbia-and-montenegro.html
 */
class CsSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'KOS', // Kosovo
        'MON', // Montenegro
        'SER', // Serbia
        'VOJ', // Vojvodina
    ];

    public $compareIdentical = true;
}
