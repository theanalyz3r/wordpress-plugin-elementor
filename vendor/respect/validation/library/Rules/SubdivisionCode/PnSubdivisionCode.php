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
 * Validator for Pitcairn Islands subdivision code.
 *
 * ISO 3166-1 alpha-2: PN
 *
 * @link http://www.geonames.org/PN/administrative-division-pitcairn-islands.html
 */
class PnSubdivisionCode extends AbstractSearcher
{
    public $haystack = [null, ''];

    public $compareIdentical = true;
}
