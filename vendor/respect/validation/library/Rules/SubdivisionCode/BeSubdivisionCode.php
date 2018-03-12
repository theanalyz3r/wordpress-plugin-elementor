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
 * Validator for Belgium subdivision code.
 *
 * ISO 3166-1 alpha-2: BE
 *
 * @link http://www.geonames.org/BE/administrative-division-belgium.html
 */
class BeSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'BRU', // Brussels
        'VLG', // Flanders
        'WAL', // Wallonia
        'BRU', // Brussels
        'VAN', // Antwerpen
        'VBR', // Vlaams Brabant
        'VLI', // Limburg
        'VOV', // Oost-Vlaanderen
        'VWV', // West-Vlaanderen
        'WBR', // Brabant Wallon
        'WHT', // Hainaut
        'WLG', // Liege
        'WLX', // Luxembourg
        'WNA', // Namur
    ];

    public $compareIdentical = true;
}
