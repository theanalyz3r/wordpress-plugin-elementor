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
 * Validator for Djibouti subdivision code.
 *
 * ISO 3166-1 alpha-2: DJ
 *
 * @link http://www.geonames.org/DJ/administrative-division-djibouti.html
 */
class DjSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'AR', // Arta
        'AS', // 'Ali Sabih
        'DI', // Dikhil
        'DJ', // Djibouti
        'OB', // Obock
        'TA', // Tadjoura
    ];

    public $compareIdentical = true;
}
