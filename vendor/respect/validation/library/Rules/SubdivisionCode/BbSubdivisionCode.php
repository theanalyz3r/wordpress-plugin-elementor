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
 * Validator for Barbados subdivision code.
 *
 * ISO 3166-1 alpha-2: BB
 *
 * @link http://www.geonames.org/BB/administrative-division-barbados.html
 */
class BbSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        '01', // Christ Church
        '02', // Saint Andrew
        '03', // Saint George
        '04', // Saint James
        '05', // Saint John
        '06', // Saint Joseph
        '07', // Saint Lucy
        '08', // Saint Michael
        '09', // Saint Peter
        '10', // Saint Philip
        '11', // Saint Thomas
    ];

    public $compareIdentical = true;
}
