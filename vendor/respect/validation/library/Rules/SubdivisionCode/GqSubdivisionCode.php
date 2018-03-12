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
 * Validator for Equatorial Guinea subdivision code.
 *
 * ISO 3166-1 alpha-2: GQ
 *
 * @link http://www.geonames.org/GQ/administrative-division-equatorial-guinea.html
 */
class GqSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'C', // Región Continental
        'I', // Región Insular
        'AN', // Provincia Annobon
        'BN', // Provincia Bioko Norte
        'BS', // Provincia Bioko Sur
        'CS', // Provincia Centro Sur
        'KN', // Provincia Kie-Ntem
        'LI', // Provincia Litoral
        'WN', // Provincia Wele-Nzas
    ];

    public $compareIdentical = true;
}
