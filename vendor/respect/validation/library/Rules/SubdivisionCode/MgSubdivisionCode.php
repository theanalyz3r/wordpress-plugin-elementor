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
 * Validator for Madagascar subdivision code.
 *
 * ISO 3166-1 alpha-2: MG
 *
 * @link http://www.geonames.org/MG/administrative-division-madagascar.html
 */
class MgSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'A', // Toamasina province
        'D', // Antsiranana province
        'F', // Fianarantsoa province
        'M', // Mahajanga province
        'T', // Antananarivo province
        'U', // Toliara province
    ];

    public $compareIdentical = true;
}
