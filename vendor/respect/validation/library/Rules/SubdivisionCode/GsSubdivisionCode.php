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
 * Validator for South Georgia and the South Sandwich Islands subdivision code.
 *
 * ISO 3166-1 alpha-2: GS
 *
 * @link http://www.geonames.org/GS/administrative-division-south-georgia-and-the-south-sandwich-islands.html
 */
class GsSubdivisionCode extends AbstractSearcher
{
    public $haystack = [null, ''];

    public $compareIdentical = true;
}
