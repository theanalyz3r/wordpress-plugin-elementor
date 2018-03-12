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
 * Validator for Botswana subdivision code.
 *
 * ISO 3166-1 alpha-2: BW
 *
 * @link http://www.geonames.org/BW/administrative-division-botswana.html
 */
class BwSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'CE', // Central
        'GH', // Ghanzi
        'KG', // Kgalagadi
        'KL', // Kgatleng
        'KW', // Kweneng
        'NE', // North East
        'NW', // North West
        'SE', // South East
        'SO', // Southern
    ];

    public $compareIdentical = true;
}
