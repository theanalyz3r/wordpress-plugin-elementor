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
 * Validator for Greenland subdivision code.
 *
 * ISO 3166-1 alpha-2: GL
 *
 * @link http://www.geonames.org/GL/administrative-division-greenland.html
 */
class GlSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'KU', // Kujalleq
        'QA', // Qaasuitsup
        'QE', // Qeqqata
        'SM', // Sermersooq
    ];

    public $compareIdentical = true;
}
