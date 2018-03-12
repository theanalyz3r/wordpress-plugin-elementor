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
 * Validator for British Virgin Islands subdivision code.
 *
 * ISO 3166-1 alpha-2: VG
 *
 * @link http://www.geonames.org/VG/administrative-division-british-virgin-islands.html
 */
class VgSubdivisionCode extends AbstractSearcher
{
    public $haystack = [null, ''];

    public $compareIdentical = true;
}
