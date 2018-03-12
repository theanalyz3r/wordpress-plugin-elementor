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
 * Validator for Saint Lucia subdivision code.
 *
 * ISO 3166-1 alpha-2: LC
 *
 * @link http://www.geonames.org/LC/administrative-division-saint-lucia.html
 */
class LcSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'AR', // Anse-la-Raye
        'CA', // Castries
        'CH', // Choiseul
        'DA', // Dauphin
        'DE', // Dennery
        'GI', // Gros-Islet
        'LA', // Laborie
        'MI', // Micoud
        'PR', // Praslin
        'SO', // Soufriere
        'VF', // Vieux-Fort
    ];

    public $compareIdentical = true;
}
