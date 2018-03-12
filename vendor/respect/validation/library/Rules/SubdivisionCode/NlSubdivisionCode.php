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
 * Validator for Netherlands subdivision code.
 *
 * ISO 3166-1 alpha-2: NL
 *
 * @link http://www.geonames.org/NL/administrative-division-netherlands.html
 */
class NlSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'DR', // Drenthe
        'FL', // Flevoland
        'FR', // Friesland
        'GE', // Gelderland
        'GR', // Groningen
        'LI', // Limburg
        'NB', // Noord Brabant
        'NH', // Noord Holland
        'OV', // Overijssel
        'UT', // Utrecht
        'ZE', // Zeeland
        'ZH', // Zuid Holland
    ];

    public $compareIdentical = true;
}
