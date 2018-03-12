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
 * Validator for Guyana subdivision code.
 *
 * ISO 3166-1 alpha-2: GY
 *
 * @link http://www.geonames.org/GY/administrative-division-guyana.html
 */
class GySubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'BA', // Barima-Waini
        'CU', // Cuyuni-Mazaruni
        'DE', // Demerara-Mahaica
        'EB', // East Berbice-Corentyne
        'ES', // Essequibo Islands-West Demerara
        'MA', // Mahaica-Berbice
        'PM', // Pomeroon-Supenaam
        'PT', // Potaro-Siparuni
        'UD', // Upper Demerara-Berbice
        'UT', // Upper Takutu-Upper Essequibo
    ];

    public $compareIdentical = true;
}
