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
 * Validator for Democratic Republic of the Congo subdivision code.
 *
 * ISO 3166-1 alpha-2: CD
 *
 * @link http://www.geonames.org/CD/administrative-division-democratic-republic-of-the-congo.html
 */
class CdSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'BC', // Bas-Congo
        'BN', // Bandundu
        'EQ', // Equateur
        'KA', // Katanga
        'KE', // Kasai-Oriental
        'KN', // Kinshasa
        'KW', // Kasai-Occidental
        'MA', // Maniema
        'NK', // Nord-Kivu
        'OR', // Orientale
        'SK', // Sud-Kivu
    ];

    public $compareIdentical = true;
}
