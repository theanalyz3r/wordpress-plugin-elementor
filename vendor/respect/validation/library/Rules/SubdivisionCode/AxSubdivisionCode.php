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
 * Validator for Åland subdivision code.
 *
 * ISO 3166-1 alpha-2: AX
 *
 * @link http://www.geonames.org/AX/administrative-division-aland.html
 */
class AxSubdivisionCode extends AbstractSearcher
{
    public $haystack = [null, ''];

    public $compareIdentical = true;
}
