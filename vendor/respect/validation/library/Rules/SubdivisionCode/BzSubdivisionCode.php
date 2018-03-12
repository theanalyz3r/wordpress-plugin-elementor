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
 * Validator for Belize subdivision code.
 *
 * ISO 3166-1 alpha-2: BZ
 *
 * @link http://www.geonames.org/BZ/administrative-division-belize.html
 */
class BzSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'BZ', // Belize District
        'CY', // Cayo District
        'CZL', // Corozal District
        'OW', // Orange Walk District
        'SC', // Stann Creek District
        'TOL', // Toledo District
    ];

    public $compareIdentical = true;
}
