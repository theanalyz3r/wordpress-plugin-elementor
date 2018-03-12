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
 * Validator for Iceland subdivision code.
 *
 * ISO 3166-1 alpha-2: IS
 *
 * @link http://www.geonames.org/IS/administrative-division-iceland.html
 */
class IsSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        '1', // Höfuðborgarsvæði
        '2', // Suðurnes
        '3', // Vesturland
        '4', // Vestfirðir
        '5', // Norðurland Vestra
        '6', // Norðurland Eystra
        '7', // Austurland
        '8', // Suðurland
    ];

    public $compareIdentical = true;
}
