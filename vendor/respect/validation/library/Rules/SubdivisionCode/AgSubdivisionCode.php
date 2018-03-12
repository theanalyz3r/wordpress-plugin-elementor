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
 * Validator for Antigua and Barbuda subdivision code.
 *
 * ISO 3166-1 alpha-2: AG
 *
 * @link http://www.geonames.org/AG/administrative-division-antigua-and-barbuda.html
 */
class AgSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        '03', // Saint George
        '04', // Saint John
        '05', // Saint Mary
        '06', // Saint Paul
        '07', // Saint Peter
        '08', // Saint Philip
        '10', // Barbuda
        '11', // Redonda
    ];

    public $compareIdentical = true;
}
