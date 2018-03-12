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
 * Validator for Sweden subdivision code.
 *
 * ISO 3166-1 alpha-2: SE
 *
 * @link http://www.geonames.org/SE/administrative-division-sweden.html
 */
class SeSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'AB', // Stockholms
        'AC', // Vasterbottens
        'BD', // Norrbottens
        'C', // Uppsala
        'D', // Sodermanlands
        'E', // Ostergotlands
        'F', // Jonkopings
        'G', // Kronobergs
        'H', // Kalmar
        'I', // Gotlands
        'K', // Blekinge
        'M', // Skåne
        'N', // Hallands
        'O', // Västra Götaland
        'S', // Varmlands
        'T', // Orebro
        'U', // Vastmanlands
        'W', // Dalarna
        'X', // Gavleborgs
        'Y', // Vasternorrlands
        'Z', // Jamtlands
    ];

    public $compareIdentical = true;
}
